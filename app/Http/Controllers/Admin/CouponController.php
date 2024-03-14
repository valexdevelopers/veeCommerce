<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models;

class CouponController extends Controller
{
    //
    public function display(){
        $coupons = Models\Coupon::paginate(10);
        return view('admin.coupon.couponlist')->with('coupons', $coupons);
    }

    public function show(){
        return view('admin.coupon.addcoupon');
    }

    public function create(Request $request){
        $data = $request->validate([
            'coupon_code' =>  ['bail', 'required', 'string', 'min:4', 'unique:'.Models\Coupon::class, ],
            'coupon_resctriction' =>  ['bail', 'required', 'string', '', '', ],
            'coupon_worth' =>  ['bail', 'required', 'numeric', 'digits_between:1,100' ],
            'max_value' =>  ['bail', 'nullable', 'numeric' ],
        ]);

        $coupon = Models\Coupon::create([
            'unique_id' => random_int(1000, 99999),
            'coupon_code' => $request->coupon_code,
            'coupon_resctriction' => $request->coupon_resctriction,
            'coupon_worth' => $request->coupon_worth,
            'max_value' => $request->max_value ?? null,

        ]);

        return redirect()->route('admin.coupon.new')->with('message', 'You created a new coupon, named: '.$coupon->coupon_code)
                           ->with('message-color', 'alert-success');
    }


    public function delete($coupon_code){
        $coupon = Models\Coupon::find($coupon_code);
        $coupon->delete();
        return redirect()->route('admin.coupons')->with('message', 'You deleted a coupon, named: '.$coupon->coupon_code)
                           ->with('message-color', 'alert-success');
    }
}
