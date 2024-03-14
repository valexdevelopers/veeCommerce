<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models;

class AdminController extends Controller
{
    //

    public function index(){
        $orders = Models\Order::paginate(10);
        $products = Models\Product::all();
        $brands = Models\Brand::all();
        $users = Models\User::all();
        $purchase = Models\Purchase::all();
        return view('admin.index')->with('orders', $orders);
}
}
