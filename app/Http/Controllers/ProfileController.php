<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models;

class ProfileController extends Controller
{



    public function changeemail(){
        $advert =  Models\AdvertBanner::where('visibility', 'show')->get();
        $userCart = Models\Cart::where('session_id', session()->getId())->get();
        return view('store.auth.change-email')->with('advert',  $advert)->with('itemsInCart',  $userCart);
    }
    /*
    *
    * Display the user's profile form.
    */

    public function show(){
        $advert =  Models\AdvertBanner::where('visibility', 'show')->get();
        $userCart =  Auth::user()->cartsOwned;  
        return view('dashboard.profile')->with('advert',  $advert)->with('itemsInCart',  $userCart);

    }

   
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('auth.user.profile')->with('message', 'Your Profile Updated ! ')
                           ->with('message-color', 'alert-success');
    }

    public function updateemail(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('verification.notice')->with('status', 'email-changed');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
