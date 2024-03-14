<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models;
class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     */
    public function __invoke(Request $request): RedirectResponse|View
    {
        $advert =  Models\AdvertBanner::where('visibility', 'show')->get();
        $userCart = Models\Cart::where('session_id', session()->getId())->get();
        return $request->user()->hasVerifiedEmail()
                    ? redirect()->intended(RouteServiceProvider::HOME)
                    : view('store.auth.verify-email')->with('advert',  $advert)->with('itemsInCart',  $userCart);
    }
}
