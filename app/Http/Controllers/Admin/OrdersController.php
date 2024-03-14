<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models;

class OrdersController extends Controller
{
    //

    public function display(){
        $orders = Models\Order::paginate(10);
        
         return view('admin.order.orders')->with('orders', $orders);
    }


    public function show($order_id){
        $order = Models\Order::find($order_id);
        return view('admin.order.orderdetails')->with('order', $order);

    }

    public function add(){
        $products = Models\Product::all();
        return view('admin.order.neworder')->with('products', $products);
    }


    public function create(){
        
    }
}
