<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models;
use Auth;

class WishlistController extends Controller
{
    //

    public function show(){
        $advert =  Models\AdvertBanner::where('visibility', 'show')->get();
        $userCart =  Auth::user()->cartsOwned;   
        $userWishlist = Auth::user()->wishlistowned;
        return view('dashboard.wishlist')->with('advert',  $advert)->with('itemsInCart',  $userCart)->with('userWishlist',  $userWishlist);

    }

    public function delete($product_id){
        // dd($product_id);
        $wishlist = Auth::user()->wishlistowned->find($product_id);
      
        $wishlist->delete();
        return redirect()->route('auth.user.wishlist');

    }
}
