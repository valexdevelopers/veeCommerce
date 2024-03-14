<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models;
use Auth;

class StoreController extends Controller
{
    //

    public function home(){
        $storebanners = Models\StoreBanner::all();
        $advert =  Models\AdvertBanner::where('visibility', 'show')->get();
        $products = Models\Product::latest()->paginate(20);
        $recommendedProducts = Models\Product::paginate(12);
        $brands = Models\Brand::paginate(10);
        $categories = Models\Category::paginate(10);
        $allcarts = Models\Cart::all();
        $distinctCartProduct = Models\Cart::distinct()->select('product_id')->get();
        if(Auth::check()){
            $userCart =  Auth::user()->cartsOwned;
        }else{
            $userCart = Models\Cart::where('session_id', session()->getId())->get();
        }
        return view('store.index')->with('storebanners',  $storebanners)
                                    ->with('allcarts',  $allcarts)
                                    ->with('advert',  $advert)
                                    ->with('itemsInCart',  $userCart)
                                    ->with('products', $products)
                                    ->with('brands', $brands)
                                    ->with('recommendedProducts',  $recommendedProducts)
                                    ->with('categories', $categories);


    }
}
