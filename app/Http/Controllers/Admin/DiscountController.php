<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models;
use Auth;
use DateTime;

class DiscountController extends Controller
{
    //

    public function display(){
        $discounts = Models\Promo::paginate(10);
        return view('admin.discount.alldiscount')->with('discounts', $discounts);
    }

    public function show(){
        $products = Models\Product::all();
        $categories = Models\Category::all();
        return view('admin.discount.newdiscount')->with('products', $products)->with('categories', $categories);
    }

    public function create(Request $request){
        $data = $request->validate([
            'product_categories' => ['bail', 'nullable', 'array'],
            'products' => ['bail', 'nullable', 'array'],
            'discount_name' => ['bail', 'nullable', 'string', 'min:2', 'unique:'.Models\Promo::class],
            'discount_start_date' => ['bail', 'required', 'date' ],
            'discount_end_date' => ['bail', 'required', 'date'],
            'discount_max_value' => ['bail', 'nullable', 'numeric'],
            'discount_type' => ['bail', 'required', 'string'],
            'discount_value' => ['bail', 'required', 'numeric'],
           
        ]);

        $discount_start_date = new DateTime($request->discount_start_date);
        $today = new DateTime(date("Y-m-d H:i:s"));
        if($today >=  $discount_start_date){
            $startNow = 1;
            //sale start now
            
        }else{
            $startNow = 0;
            // sale starts at a later date
        }
        
        // dd($request->all());
        $promo = Models\Promo::create([
            'unique_id' => random_int(1000, 9999),
            'admin_id' => Auth::guard('admin')->user()->id,
            'discount_name' => $request->discount_name,
            'discount_type' => $request->discount_type,
            'discount_value' => $request->discount_value,
            'discount_max_value' => $request->discount_max_value ?? null,
            'discount_start_date' => $request->discount_start_date,
            'discount_end_date' => $request->discount_end_date,
            'status' => $startNow,
        ]);
        $allProducts = Models\Product::all();
        // $thePromo = Models\Promo::find($promo->id);
        $discountProducts = [];

        switch ($request) {
            
            case $request->has('product_categories') && $request->has('products'):

                foreach($request->products as $oneProductName => $oneProductId){
                    $productName = $oneProductName;
                    if($productName == 'all' && $startNow > 0){
                        foreach($allProducts as $singleProduct){
                            if($request->discount_type == 'percentage'){
                                $percentageUnit = $request->discount_value / 100;
                                $discountRemoved = $singleProduct->product_price * $percentageUnit;
                                if($request->has('discount_max_value') && (float)$discountRemoved > (float)$request->discount_max_value){
                                    $discount_price = $singleProduct->product_price - $request->discount_max_value;
                                }
                                $discount_price = $singleProduct->product_price - $discountRemoved;
                            }elseif($request->discount_type == 'fixed'){
                                $discount_price = $singleProduct->product_price - $request->discount_value;
                            }
                            // save products id to promo products json
                            array_push($discountProducts, $singleProduct->id);
                            // dd($discount_price );
                            $singleProduct->product_discount_price  = $discount_price;
                            $singleProduct->promo_id   = $promo->id;
                            $singleProduct->save();
                        }
                        $stopOngoingSales = Models\Promo::where('status', 1)->update(['status'=> 0]);
                    }elseif($productName == 'all' && $startNow == 0){
                        array_push($discountProducts, $singleProduct->id);
                        
                    }else{
                        $singleProduct = Models\Product::find($oneProductId['product_id']);
                        if($startNow > 0){
                            
                            if($request->discount_type == 'percentage'){
                                $percentageUnit = $request->discount_value / 100;
                                $discountRemoved = $singleProduct->product_price * $percentageUnit;
                                if($request->has('discount_max_value') && (float)$discountRemoved > (float)$request->discount_max_value){
                                    $discount_price = $singleProduct->product_price - $request->discount_max_value;
                                }
                                $discount_price = $singleProduct->product_price - $discountRemoved;
                            }elseif($request->discount_type == 'fixed'){
                                $discount_price = $singleProduct->product_price - $request->discount_value;
                            }
                            // save products id to promo products json
                            array_push($discountProducts, $singleProduct->id);
                            // dd($discount_price );
                            $singleProduct->product_discount_price  = $discount_price;
                            $singleProduct->promo_id   = $promo->id;
                            $singleProduct->save();
                            
                        }else{
                            array_push($discountProducts, $singleProduct->id);
                        
                        }
                        
                    }
                }

                foreach($request->product_categories as $category_name => $category_id){    
                    $categoriesName = $category_name;
                    if($category_name == 'all' && $startNow > 0){
                        foreach($allProducts as $singleProduct){
                            if($request->discount_type == 'percentage'){
                                $percentageUnit = $request->discount_value / 100;
                                $discountRemoved = $singleProduct->product_price * $percentageUnit;
                                if($request->has('discount_max_value') && (float)$discountRemoved > (float)$request->discount_max_value){
                                    $discount_price = $singleProduct->product_price - $request->discount_max_value;
                                }
                                $discount_price = $singleProduct->product_price - $discountRemoved;
                            }elseif($request->discount_type == 'fixed'){
                                $discount_price = $singleProduct->product_price - $request->discount_value;
                            }
                            // save products id to promo products json
                            array_push($discountProducts, $singleProduct->id);
                            // dd($discount_price );
                            $singleProduct->product_discount_price  = $discount_price;
                            $singleProduct->promo_id   = $promo->id;
                            $singleProduct->save();
                            
                        }
                        $stopOngoingSales = Models\Promo::where('status', 1)->update(['status'=> 0]);  
                    }elseif($category_name == 'all' && $startNow == 0){
                        array_push($discountProducts, $singleProduct->id);
                        
                    }else{
                        $productInCategory = Models\Category::find($category_id['category_id']);
                        foreach($productInCategory->CategoriesProduct as $singleProduct){
                            if($startNow > 0){
                            
                                if($request->discount_type == 'percentage'){
                                    $percentageUnit = $request->discount_value / 100;
                                    $discountRemoved = $singleProduct->product_price * $percentageUnit;
                                    if($request->has('discount_max_value') && (float)$discountRemoved > (float)$request->discount_max_value){
                                        $discount_price = $singleProduct->product_price - $request->discount_max_value;
                                    }
                                    $discount_price = $singleProduct->product_price - $discountRemoved;
                                }elseif($request->discount_type == 'fixed'){
                                    $discount_price = $singleProduct->product_price - $request->discount_value;
                                }
                                // save products id to promo products json
                                array_push($discountProducts, $singleProduct->id);
                                // dd($discount_price );
                                $singleProduct->product_discount_price  = $discount_price;
                                $singleProduct->promo_id   = $promo->id;
                                $singleProduct->save();
                                
                            }else{
                                array_push($discountProducts, $singleProduct->id);
                            
                            } 
                        }
                        
                        
                        
                    }
                   
                }

                break;

            case $request->has('product_categories'):
                foreach($request->product_categories as $category_name => $category_id){    
                    $categoriesName = $category_name;
                    if($category_name == 'all' && $startNow > 0){
                        foreach($allProducts as $singleProduct){
                            if($request->discount_type == 'percentage'){
                                $percentageUnit = $request->discount_value / 100;
                                $discountRemoved = $singleProduct->product_price * $percentageUnit;
                                if($request->has('discount_max_value') && (float)$discountRemoved > (float)$request->discount_max_value){
                                    $discount_price = $singleProduct->product_price - $request->discount_max_value;
                                }
                                $discount_price = $singleProduct->product_price - $discountRemoved;
                            }elseif($request->discount_type == 'fixed'){
                                $discount_price = $singleProduct->product_price - $request->discount_value;
                            }
                            // save products id to promo products json
                            array_push($discountProducts, $singleProduct->id);
                            // dd($discount_price );
                            $singleProduct->product_discount_price  = $discount_price;
                            $singleProduct->promo_id   = $promo->id;
                            $singleProduct->save();
                            
                        }
                        $stopOngoingSales = Models\Promo::where('status', 1)->update(['status'=> 0]);
                      break;  
                    }elseif($category_name == 'all' && $startNow == 0){
                        array_push($discountProducts, $singleProduct->id);
                        break;
                    }else{
                        $productInCategory = Models\Category::find($category_id['category_id']);
                        foreach($productInCategory->CategoriesProduct as $singleProduct){
                            if($startNow > 0){
                            
                                if($request->discount_type == 'percentage'){
                                    $percentageUnit = $request->discount_value / 100;
                                    $discountRemoved = $singleProduct->product_price * $percentageUnit;
                                    if($request->has('discount_max_value') && (float)$discountRemoved > (float)$request->discount_max_value){
                                        $discount_price = $singleProduct->product_price - $request->discount_max_value;
                                    }
                                    $discount_price = $singleProduct->product_price - $discountRemoved;
                                }elseif($request->discount_type == 'fixed'){
                                    $discount_price = $singleProduct->product_price - $request->discount_value;
                                }
                                // save products id to promo products json
                                array_push($discountProducts, $singleProduct->id);
                                // dd($discount_price );
                                $singleProduct->product_discount_price  = $discount_price;
                                $singleProduct->promo_id   = $promo->id;
                                $singleProduct->save();
                                
                            }else{
                                array_push($discountProducts, $singleProduct->id);
                            
                            } 
                        }
                        
                        
                        
                    }
                   
                }
                break;

            case $request->has('products') :
                foreach($request->products as $oneProductName => $oneProductId){
                    $productName = $oneProductName;
                    if($productName == 'all' && $startNow > 0){
                        foreach($allProducts as $singleProduct){
                            if($request->discount_type == 'percentage'){
                                $percentageUnit = $request->discount_value / 100;
                                $discountRemoved = $singleProduct->product_price * $percentageUnit;
                                if($request->has('discount_max_value') && (float)$discountRemoved > (float)$request->discount_max_value){
                                    $discount_price = $singleProduct->product_price - $request->discount_max_value;
                                }
                                $discount_price = $singleProduct->product_price - $discountRemoved;
                            }elseif($request->discount_type == 'fixed'){
                                $discount_price = $singleProduct->product_price - $request->discount_value;
                            }
                            // save products id to promo products json
                            array_push($discountProducts, $singleProduct->id);
                            // dd($discount_price );
                            $singleProduct->product_discount_price  = $discount_price;
                            $singleProduct->promo_id   = $promo->id;
                            $singleProduct->save();
                        }
                        $stopOngoingSales = Models\Promo::where('status', 1)->update(['status'=> 0]);
                        break;
                    }elseif($productName == 'all' && $startNow == 0){
                        array_push($discountProducts, $singleProduct->id);
                        break;
                    }else{
                        $singleProduct = Models\Product::find($oneProductId['product_id']);
                        if($startNow > 0){
                            
                            if($request->discount_type == 'percentage'){
                                $percentageUnit = $request->discount_value / 100;
                                $discountRemoved = $singleProduct->product_price * $percentageUnit;
                                if($request->has('discount_max_value') && (float)$discountRemoved > (float)$request->discount_max_value){
                                    $discount_price = $singleProduct->product_price - $request->discount_max_value;
                                }
                                $discount_price = $singleProduct->product_price - $discountRemoved;
                            }elseif($request->discount_type == 'fixed'){
                                $discount_price = $singleProduct->product_price - $request->discount_value;
                            }
                            // save products id to promo products json
                            array_push($discountProducts, $singleProduct->id);
                            // dd($discount_price );
                            $singleProduct->product_discount_price  = $discount_price;
                            $singleProduct->promo_id   = $promo->id;
                            $singleProduct->save();
                            
                        }else{
                            array_push($discountProducts, $singleProduct->id);
                        
                        }
                        
                    }
                }
                # code...
                break;
            
            default:
                # code...
                break;
        }
        
        $promo->products = json_encode($discountProducts);
        $promo->status = true;
        $promo->save();
        return redirect()->route('admin.discount')->with('message', 'You created a discount sale')
                                                      ->with('message-color', 'alert-success');
    }



    public function pause($discount_id){
        $removeProductDiscount = Models\Product::where('promo_id', $discount_id)->update(['promo_id' => null, 'product_discount_price' => null]);
        $promo = Models\Promo::find($discount_id);
        $promo->status = false;
        $promo->save();
        return redirect()->route('admin.discount')->with('message', 'You pause a running discount sale')
                                                      ->with('message-color', 'alert-success');
    }

    public function start($discount_id){
        $promo = Models\Promo::find($discount_id);
        $promoProducts = json_decode($promo->products);
        foreach($promoProducts as $singleProduct){
            if($promo->discount_type == 'percentage'){
                $percentageUnit = $promo->discount_value / 100;
                $discountRemoved = $singleProduct->product_price * $percentageUnit;
                if($promo->has('discount_max_value') && (float)$discountRemoved > (float)$promo->discount_max_value){
                    $discount_price = $singleProduct->product_price - $promo->discount_max_value;
                }
                $discount_price = $singleProduct->product_price - $discountRemoved;
            }elseif($promo->discount_type == 'fixed'){
                $discount_price = $singleProduct->product_price - $promo->discount_value;
            }
            // save products id to promo products json
            array_push($discountProducts, $singleProduct->id);
            // dd($discount_price );
            $singleProduct->product_discount_price  = $discount_price;
            $singleProduct->promo_id   = $promo->id;
            $singleProduct->save();
        }
        $promo->status = true;
        $promo->save();
        return redirect()->route('admin.discount')->with('message', 'You started running a discount sale')
                                                      ->with('message-color', 'alert-success');
    }

    public function delete($discount_id){
        $removeProductDiscount = Models\Product::where('promo_id', $discount_id)->update(['promo_id' => null, 'product_discount_price' => null]);
        $promo = Models\Promo::find($discount_id);
        $promo->forceDelete();
        return redirect()->route('admin.discount')->with('message', 'You deleted a discount sale')
                                                      ->with('message-color', 'alert-success');
    }
}
