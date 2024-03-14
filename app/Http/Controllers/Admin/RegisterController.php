<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use App\Models\Admin;


class RegisterController extends Controller
{
    //
    public function show(){
        return view('store.auth.admin-register');
    }

    public function create(Request $request): RedirectResponse{
        $data = $request->validate([
            'email' => ['bail', 'required', 'string', 'email', '', 'unique:'.Admin::class, ],
            'password' => ['bail', 'required', 'string', 'max:16', 'confirmed', Password::min(8)->mixedCase()->symbols()->numbers()],
            'firstname' => ['bail', 'required', 'string', 'min:2', '', '', ],
            'lastname' => ['bail', 'required', 'string', 'min:2', '', '', ],
            'phone' => ['bail', 'required', 'string', 'min:11', 'max:14']
            ]);
        
        $firstAdmin = Admin::all();
        if($firstAdmin->count() == 0){
            $isSuperAdmin = true;
            $admin_verified_at = Now();
            $message ='Your admin account has been created. You can start customising your store website';
            $message_color = 'alert-success';
        }else{
            $isSuperAdmin = false;
            $admin_verified_at = null;
            $message ='Your admin account has been created. A super Admin will review and approve your account.';
            $message_color = 'alert-dark';
        }

        $create = Admin::firstOrCreate(['email' => $request->email],
            [
                'unique_id' => random_int(1000, 99999),
                'isSuperAdmin' => $isSuperAdmin,
                'admin_verified_at' => $admin_verified_at,
                'firstname' => $request->firstname ,
                'lastname' => $request->lastname ,
                'phone' => $request->phone ,
                'password' => Hash::make($request->password)
            ]);
        
       
        return back()->with('message', $message)
                            ->with('message-color', $message_color);
         
      
        

    }
}
