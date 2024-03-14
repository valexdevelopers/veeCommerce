<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

use Auth;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::min(8)->mixedCase()->numbers()->symbols(), 'confirmed'],
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with('message', 'Your Password has been changed ')
        ->with('message-color', 'alert-success');
    }


    public function show(){
        $advert =  Models\AdvertBanner::where('visibility', 'show')->get();
        $userCart =  Auth::user()->cartsOwned;  
        return view('dashboard.password')->with('advert',  $advert)->with('itemsInCart',  $userCart);
    }
}
