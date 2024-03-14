<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models;

class OrdersController extends Controller
{
    //

    public function display() {
        $advert =  Models\AdvertBanner::where('visibility', 'show')->get();
        $orders = Models\Order::where('user_id', Auth::user()->id)->latest()->paginate(10);
        $userCart =  Auth::user()->cartsOwned;   
        return view('dashboard.orders')->with('advert',  $advert)->with('itemsInCart',  $userCart)->with('orders',  $orders);
    }

    public function show($order_id){
        $order = Models\Order::find($order_id);
        $order_details = json_decode($order->order_details);
        $products_array = [];
        foreach($order_details as $key => $value){
            $product = Models\Product::find($key);
            array_push($products_array,  $product);
           
        }
        $advert =  Models\AdvertBanner::where('visibility', 'show')->get();
        $userCart =  Auth::user()->cartsOwned;   
        return view('dashboard.singleorder')->with('products_array',  $products_array)->with('advert',  $advert)->with('itemsInCart',  $userCart)->with('order',  $order)->with('order_details',  $order_details);

    }
}
