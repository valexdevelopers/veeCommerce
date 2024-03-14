<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models;

class AddressController extends Controller
{
    //
    public function show(){
        $advert =  Models\AdvertBanner::where('visibility', 'show')->get();
        $address = Auth::user()->ownedaddress;
        $userCart =  Auth::user()->cartsOwned;   
       // dd($totalquantity);
        return view('dashboard.address')->with('advert',  $advert)->with('itemsInCart',  $userCart)->with('address',  $address);
    }

    public function showform(){
        $advert =  Models\AdvertBanner::where('visibility', 'show')->get();
        $address = Auth::user()->ownedaddress;
        $userCart =  Auth::user()->cartsOwned;   
       // dd($totalquantity);
        return view('dashboard.billing-address')->with('advert',  $advert)->with('itemsInCart',  $userCart)->with('address',  $address);
    }

    public function create(Request $request){
        
        $validations = $request->validate([
            'billing_firstname' => ['bail', 'required', 'string', 'max:30'],
            'billing_lastname' => ['bail', 'required', 'string', 'max:30'],
            'billing_street' => ['bail', 'required', 'string', 'max:255'],
            'billing_apartment' => ['bail', 'nullable', 'string', 'max:255'],
            'billing_country' => ['bail', 'required', 'string', 'max:30'],
            'billing_postalcode' => ['bail', 'required', 'string', 'max:10'],
            'billing_region' => ['bail', 'required', 'string', 'max:50'],
            'billing_city' => ['bail', 'required', 'string', 'max:50'],
            'billing_phone' => ['bail', 'required', 'string', 'max:16'],
            
        ]);

        Models\Address::updateOrCreate([
            'user_id' => Auth::user()->id
        ], 
        [
            
            'firstname' =>  $request->billing_firstname,
            'lastname' =>  $request->billing_lastname,
            'street' => $request->billing_street,
            'apartment' => $request->billing_apartment,
            'town' => $request->billing_city,
            'region' => $request->billing_region,
            'country' => $request->billing_country,
            'postal_code' => $request->billing_postalcode,
            'mobile' => $request->billing_phone

        ]);
        
        return redirect()->route('auth.user.address')->with('message', 'You have added a new delivery Address')
                                ->with('message-color', 'alert-success');


    }
}
