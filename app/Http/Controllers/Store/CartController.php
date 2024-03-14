<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models;
use Auth;


class CartController extends Controller
{
    //

    public function apply(Request $request){
        if(Auth::check()){
            $carts = Auth::user()->cartsOwned;
            $coupon = Models\Coupon::where('coupon_code', $request->coupon_code)->get();
          
            if($coupon->count() > 0 ){
                // check if user is eligible to use coupon
                switch($coupon[0]->coupon_resctriction){
                        case 'all_users':
                            $proceed = true;
                            break;
                        case 'first_timers':
                            $formerPurchase = Models\Purchase::where('user_id', Auth::user()->id);
                            if($formerPurchase->count() > 0){
                                $message = 'Coupon available for only new customers';
                                $proceed = false;
                            }else{
                                $proceed = true;
                            }
                            # code...
                            break;
                        case 'returning_users':
                            $formerPurchase = Models\Purchase::where('user_id', Auth::user()->id);
                            if($formerPurchase->count() < 1){
                                $message = 'Coupon available for only returning customers';
                                $proceed = false;
                            }else{
                                $proceed = true;
                            }
                            # code...
                            break;
                        default:
                            break;
                
                }

                if($proceed){
                    $notEligible = [];
                    $discountTotal = 0;
                    $eligible = [];
                    
                    // if user is eligible to use coupon, check if products are eligible
                    foreach($carts as $cart){
                        $product = Models\Product::where('id', $cart->product_id )->whereNull('product_discount_price')->get();
                        if($product->count() > 0){
                            $discountPercent = $coupon[0]->coupon_worth / 100;
                            $discount = $discountPercent * $product[0]->product_price;
                            if(!is_null($coupon[0]->max_value) && $discount > $coupon[0]->max_value){
                                $discount =  (float)$coupon[0]->max_value;
                                
                            }
                            $discountTotal += $discount;
                            array_push($eligible, $product);

                        }else{
                            array_push($notEligible, $product);
                        }
                    }

                    if(count($eligible) < 1 ){
                        
                        $message = 'Sales products are not eligible for a coupon discount';

                    }elseif(count($eligible) > 0 && count($notEligible) > 0){
                        $request->session()->put('coupon_id', $coupon->id);
                        $request->session()->put('discountTotal', $discountTotal);
                        $message = 'Some products are on Sales and are not eligible for a coupon discount';
                    }elseif(count($notEligible) < 1){
                        $request->session()->put('coupon_id', $coupon[0]->id);
                        $request->session()->put('discountTotal', $discountTotal);
                        $message = 'Coupon applied!';
                    }
                }
                
            }else{
                $message = 'Invalid coupon code';
            }
        }else{
            $message = 'Please Login to apply Coupon!';
        }
        
    return back()->with('message', $message)
        ->with('message-color', 'alert-success');    
    }




    public function show() {
        $advert =  Models\AdvertBanner::where('visibility', 'show')->get();
        if(Auth::check()){
            $userCart =  Auth::user()->cartsOwned;
        }else{
            $userCart = Models\Cart::where('session_id', session()->getId())->get();
        }
        

        if($userCart->count() > 0){
            return view('cart.index')->with('advert',  $advert)->with('itemsInCart',  $userCart);
        }else{
            // return empty cart page
            return view('cart.empty')->with('advert',  $advert)->with('itemsInCart',  $userCart);
        }
        
        
    }


     public function create(Request $request ){
        
        
        if($request->has('add-to-cart')){
            // dd($request->all());
            // check if product is out of stock
            
            $product = Models\Product::find($request->product_id);
            $product_inventory = $product->productInventory;
            $product_stock =  $product_inventory->stock_quantity;
            if($product_stock > 0){

                // check if user is logged in
                switch(Auth::user()){
                    case true:
                        $userId = Auth::user()->id;
                        $similarProductCheck = $this->SimilarProductInCart($request->product_id, $userId, session()->getId(), $request->product_price);
                        if($similarProductCheck->count() != 0){
                            // dd($similarProductCheck);
                            $cartId = $similarProductCheck[0]->id;
                            $amount = $request->quantity * $request->product_price;
                            $createNew = $this->updateSimilarProduct($request->product_id, $cartId, $request->quantity, $amount);
                            return redirect()->route('store.products.view', $request->product_id)->with('message', 'Cart updated.')
                                                        ->with('message-color', 'alert-success');
                        }else{
                            
                            // no similar product in cart, create new cart
                            $amount = $request->quantity * $request->product_price;
                            $createNew = $this->createCart($userId, $request->product_id, $product_inventory->id, $request->quantity, $amount, $request);
                            return redirect()->route('store.products.view', $request->product_id)->with('message', 'Product has been added to cart.')
                                                        ->with('message-color', 'alert-success');
                        }
                        break;

                    case false:
                        // user is not logged in
                        $sessionId = session()->getId();
                        $userId = '1';
                        $similarProductCheck = $this->SimilarProductInCart($request->product_id, $userId, $sessionId, $request->product_price);
                        if($similarProductCheck->count() != 0){
                            // dd($similarProductCheck);
                            $cartId = $similarProductCheck[0]->id;
                            $amount = $request->quantity * $request->product_price;
                            $createNew = $this->updateSimilarProduct($request->product_id, $cartId, $request->quantity, $amount);
                            return redirect()->route('store.products.view', $request->product_id)->with('message', 'Cart updated.')
                                                        ->with('message-color', 'alert-success');
                        }else{
                            
                            // no similar product in cart, create new cart
                            $amount = $request->quantity * $request->product_price;
                            $createNew = $this->createCart(null, $request->product_id, $product_inventory->id, $request->quantity, $amount, $request);
                            return redirect()->route('store.products.view', $request->product_id)->with('message', 'Product has been added to cart.')
                                                        ->with('message-color', 'alert-success');
                        }
                        break;
                }


            }else{
                // product is out of stock
                return redirect()->route('store.products.view', $product_id = $product->id)->with('message', 'Product is out of stock.')
                                                        ->with('message-color', 'alert-danger');
            }
        }elseif($request->has('save-for-later')){

            // save product to wishlist not cart
            $product = Models\Product::find($request->product_id);
            $product_inventory = $product->productInventory;
            if(!Auth::check()){
                return redirect()->route('store.products.view', $product_id = $product->id)->with('message', 'You need to login first to save an item')
                                                        ->with('message-color', 'alert-secondary');
            }else{
                $userId = Auth::user()->id;
                $similarProductCheck = $this->SimilarProductInWishlist($request->product_id, Auth::user()->id, $request->product_price);
                if($similarProductCheck->count() != 0){
                    
                    return redirect()->route('store.products.view', $request->product_id)->with('message', 'Product already in wishlist.')
                                                ->with('message-color', 'alert-success');
                }else{
                    
                    // no similar product in Wishlist, create new Wishlist
                    
                    $createNew = $this->createWishlist(Auth::user()->id, $request->product_id, $product_inventory->id, $request);
                    return redirect()->route('store.products.view', $request->product_id)->with('message', 'Product has been added to wishlist.')
                                                ->with('message-color', 'alert-success');
                }
            }
        }
        
        

    }

    public function update(Request $request){
        // $newId = [];
        foreach($request->cart as $card_id => $quantityarray){
           
            $cart = Models\Cart::find($card_id);
            $productprice = $cart->cartProducts->product_price;
            $newsubtotal = $quantityarray['quantity'] * $productprice;
            $cart->subtotal = $newsubtotal;
            $cart->quantity = $quantityarray['quantity'];
            $cart->save();
            // array_push($newId, $productprice);
        }
        // dd($newId);
        return redirect()->route('store.carts.show')->with('message', 'Your cart has been updated')
                                    ->with('message-color', 'alert-success');
    }


    public function delete($id){
      
        $removeCart = Models\Cart::find($id);
        $removeCart->forceDelete();
        return redirect()->route('store.carts.show')->with('message', 'Your cart has been updated')
                                    ->with('message-color', 'alert-success');
    }


    // private functions
    private function SimilarProductInCart($productId, $userId, $sessionId, $product_price){
        $cartsWithSimilarProduct = Models\Cart::where([['product_id', $productId], ['user_id', $userId],  ['price', $product_price]])
                            ->orWhere([['product_id', $productId], ['session_id', $sessionId], ['price', $product_price]])->get();
        
        return $cartsWithSimilarProduct;
   }




   // update cart function
   private function updateSimilarProduct($productId, $cartId, $quantity, $amount){
        $update = Models\Cart::where([['id', $cartId], ['product_id', $productId]] )
                                ->incrementEach(['quantity' => $quantity, 'subtotal' => $amount ]);
                                
   }


   //create cart function
   private function createCart($userId, $productId, $inventoryId, $quantity, $amount, $request){
        $create = Models\Cart::create([
                'user_id' => $userId,
                'inventory_id' => $inventoryId,
                'product_id' => $productId,
                'session_id' => session()->getId(),
                'size' => $request->product_size ?? null,
                'color' => $request->product_color ?? null,
                'price'=> $request->product_price,
                'quantity' => $quantity, 
                'subtotal' => $amount 
            ]);
            // dd($request->all());
                            
     }


    //create cart function
   private function createWishlist($user_Id, $productId, $inventoryId, $request){
    $create = Models\Wishlist::create([
            'user_id' => $user_Id,
            'inventory_id' => $inventoryId,
            'product_id' => $productId,
            'size' => $request->product_size ?? null,
            'color' => $request->product_color ?? null,
            'price'=> $request->product_price,
        ]);

                        
    }

    // private functions
    private function SimilarProductInWishlist($productId, $userId, $product_price){
        $wishlistWithSimilarProduct = Models\Wishlist::where([['product_id', $productId], ['user_id', $userId],  ['price', $product_price]])->get();
        
        return $wishlistWithSimilarProduct;
   }
}
