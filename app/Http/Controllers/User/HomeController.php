<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models;
use Auth;

class HomeController extends Controller
{
    //
    public function show(){
        // dd(session()->get('oldSessionId'));
       $alreadyInUserCart = Auth::user()->cartsOwned;
       $cartWithoutUserId = Models\Cart::where('session_id', session()->get('oldSessionId'))->whereNull('user_id')->get();

       if($cartWithoutUserId->count() != 0){
        
         foreach($cartWithoutUserId as $singlecart){
           // check if product already exists in logged in user cart, update if it does or insert
           $existingProduct = Models\Cart::where(['user_id' => Auth::user()->id, 'product_id' => $singlecart->product_id, 'price' => $singlecart->price])
                                         ->incrementEach(['quantity' => $singlecart->quantity, 'subtotal' => $singlecart->subtotal]);

          }
          foreach($alreadyInUserCart as $registeredCart){
           $deleteUpdatedProduct = Models\Cart::where('session_id', session()->get('oldSessionId'))
                                               ->whereNull('user_id')
                                               ->where(['product_id' => $registeredCart->product_id, 'price' => $singlecart->price])
                                               ->delete();
          }
           

           $cartUpdate = Models\Cart::where('session_id', session()->get('oldSessionId'))->whereNull('user_id')
                                       ->update(['user_id' => Auth::user()->id, 'session_id' => session()->getId()]);
                       
       }
       
       // grab total cart count
       $totalquantity = $alreadyInUserCart->sum('quantity');
       $advert =  Models\AdvertBanner::where('visibility', 'show')->get();
       $userCart =  Auth::user()->cartsOwned;   
       // dd($totalquantity);
        return view('dashboard.index')->with('advert',  $advert)->with('itemsInCart',  $userCart);
    }

    public function showlogoutform(){
      $advert =  Models\AdvertBanner::where('visibility', 'show')->get();
      $userCart =  Auth::user()->cartsOwned;   
       // dd($totalquantity);
        return view('dashboard.logout')->with('advert',  $advert)->with('itemsInCart',  $userCart);
    }
}
