<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models;
use Auth;

class CategoryController extends Controller
{
    //

    public function display($category_id){
        $advert =  Models\AdvertBanner::where('visibility', 'show')->get();
        $category = Models\Category::find($category_id);
        $categories = Models\Category::all();
        if(Auth::check()){
            $userCart =  Auth::user()->cartsOwned;
        }else{
            $userCart = Models\Cart::where('session_id', session()->getId())->get();
        }
        return view('store.category.singlecategory')->with('advert',  $advert)->with('itemsInCart',  $userCart)->with('category',  $category)->with('categories',  $categories);
    }
}
