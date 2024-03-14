<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models;
class UserController extends Controller
{
    //

    public function display(){
        $allUsers = Models\User::all();
        return view('admin.user.allusers')->with('allUsers', $allUsers);
    }

    public function show($user_id){
        $user = Models\User::find($user_id);
        $orders = Models\Order::where('user_id', $user_id)->latest()->paginate(10);
        return view('admin.user.userdetails')->with('orders', $orders)->with('user', $user);
    }
}
