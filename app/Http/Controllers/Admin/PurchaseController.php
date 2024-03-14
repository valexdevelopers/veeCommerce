<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models;


class PurchaseController extends Controller
{
    //

    public function display(){
        $purchases = Models\Purchase::paginate(10);
        
        return view('admin.order.purchases')->with('purchases', $purchases);
    }
}
