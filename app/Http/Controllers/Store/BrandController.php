<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models;
use Auth;

class BrandController extends Controller
{
    //

    public function show($brand_id){
        $brand = Models\Brand::find($brand_id);
        $productsForBrand = Models\product::where('brand_id', $brand_id)->latest()->paginate(20);
        $brands = Models\Brand::all();
        $advert =  Models\AdvertBanner::where('visibility', 'show')->get();
        if(Auth::check()){
            $userCart =  Auth::user()->cartsOwned;
        }else{
            $userCart = Models\Cart::where('session_id', session()->getId())->get();
        }

    return view('store.brands.singlebrand')->with('productsForBrand', $productsForBrand)->with('brands', $brands)->with('advert',  $advert)->with('itemsInCart',  $userCart)->with('brand', $brand);
    }


    public function display(){
        $advert =  Models\AdvertBanner::where('visibility', 'show')->get();
        $brands = Models\Brand::paginate(20);
        if(Auth::check()){
            $userCart =  Auth::user()->cartsOwned;
        }else{
            $userCart = Models\Cart::where('session_id', session()->getId())->get();
        }

        return view('store.brands.shopbybrand')->with('brands', $brands)->with('advert',  $advert)->with('itemsInCart',  $userCart);
    }
}
