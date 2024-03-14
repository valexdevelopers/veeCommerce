<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Auth;

class LoginController extends Controller
{
    //

    public function show(){
        if(Auth::guard('admin')->user() && Auth::guard('admin')->user()->admin_verified_at != null){

            return redirect()->route('admin.home');
        }else{
            
            return view('store.auth.adminlogin');
        }
       
    }
   

    public function create(Request $request) :RedirectResponse{
        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])){
            $admin = Auth::guard('admin')->user();
            if($admin->admin_verified_at != null){
                return redirect()->route('admin.home');
                
            }else{
                return redirect()->route('admin.show.login')->with('message', 'Restricted area ! You are not a verified admin')
                         ->with('message-color', 'alert-warning');
            }
         }else{
            return back()->with('message', 'Email or password Incorrect')
                         ->with('message-color', 'alert-danger');
        }   
    }

    public function logout(){
       
            Auth::guard('admin')->logout();
            return redirect()->route('admin.show.login')->with('message', 'You logged out')
                                                      ->with('message-color', 'alert-success');
        
    }
}
