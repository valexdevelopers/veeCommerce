<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use App\Models;
use Auth;

class ProfileController extends Controller
{
    //
    public function show(){
        return view('admin.personal.profile');
    }

    public function update(Request $request){
        $data = $request->validate([
            'password' => ['bail', 'nullable', 'confirmed', 'max:16',  Password::min(8)->mixedCase()->symbols()->numbers()],
            'firstname' => ['bail', 'nullable', 'string', 'min:2', '', '', ],
            'lastname' => ['bail', 'nullable', 'string', 'min:2', '', '', ],
            'phone' => ['bail', 'nullable', 'string', 'min:11', 'max:14']
            ]);

        $update = Models\Admin::find(Auth::guard('admin')->user()->id);

        $update->firstname = $request->firstname ?? Auth::guard('admin')->user()->firstname;
        $update->lastname = $request->lastname ?? Auth::guard('admin')->user()->lastname;
        $update->phone = $request->phone ?? Auth::guard('admin')->user()->phone;
        $update->password = $request->password ?? Auth::guard('admin')->user()->password;
        $update->save();

        return redirect()->route('admin.profile')->with('message', 'You updated your account.')
                            ->with('message-color', 'alert-success');
    }
}
