<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models;
use Auth;

class ProductController extends Controller
{
    //
    public function show($product_id){
        $advert =  Models\AdvertBanner::where('visibility', 'show')->get();
        if(Auth::check()){
            $userCart =  Auth::user()->cartsOwned;
        }else{
            $userCart = Models\Cart::where('session_id', session()->getId())->get();
        }

        $product = Models\Product::find($product_id);
        $brands = Models\Brand::paginate(10);
        $categories = Models\Category::paginate(10);
        return view('store.products.singleproduct')->with('advert',  $advert)->with('itemsInCart',  $userCart)->with('product', $product)->with('brands', $brands)->with('categories', $categories);;


    }

    public function display(){
        $advert =  Models\AdvertBanner::where('visibility', 'show')->get();
        if(Auth::check()){
            $userCart =  Auth::user()->cartsOwned;
        }else{
            $userCart = Models\Cart::where('session_id', session()->getId())->get();
        }
        $recommendedProducts = Models\Product::paginate(12);
        $products = Models\Product::paginate(10);
        $brands = Models\Brand::paginate(10);
        $categories = Models\Category::paginate(10);
        $allcarts = Models\Cart::all();
        return view('store.products.index')->with('advert',  $advert)
                                            ->with('itemsInCart',  $userCart)
                                            ->with('products', $products)
                                            ->with('brands', $brands)
                                            ->with('recommendedProducts',  $recommendedProducts)
                                            ->with('categories', $categories);;

    }
}
