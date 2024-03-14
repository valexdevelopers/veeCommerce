<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models;
use Str;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $advert =  Models\AdvertBanner::where('visibility', 'show')->get();
        $userCart = Models\Cart::where('session_id', session()->getId())->get();
        return view('store.auth.register')->with('advert',  $advert)->with('itemsInCart',  $userCart);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'phone' => ['required', 'string', 'max:14', 'min:9'],
            'password' => ['required', 'confirmed', Rules\Password::min(8)->mixedCase()->numbers()->symbols()],
        ]); 

        $user = User::create([
            'unique_id' => random_int(1000, 99999),
            'firstname' => Str::lower($request->firstname),
            'lastname' => Str::lower($request->lastname),
            'email' => Str::lower($request->email),
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));
        $advert =  Models\AdvertBanner::where('visibility', 'show')->get();
        $userCart = Models\Cart::where('session_id', session()->getId())->get();
        return redirect()->route('login')->with('advert',  $advert)->with('itemsInCart',  $userCart)->with('message', 'Your account has be created. You can now login.')
                                    ->with('message-color', 'alert-success');
    }
}
