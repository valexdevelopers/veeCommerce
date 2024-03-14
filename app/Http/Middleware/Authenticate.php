<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if (! $request->expectsJson()) {
            if($request->routeIs('auth.checkout.show')){
                session()->flash('message', 'You must log in to checkout.');

            }else{
                session()->flash('message', 'Please login if you are a registered user or signup');
            }
            session()->flash('message-color', 'alert-danger');
            
            return route('login');
        }


        // return $request->expectsJson() ? null : route('login')->with('message', 'You must login first')
        //                                         ->with('message-color', 'alert-success');
    }
}
