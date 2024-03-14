<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models;
use Illuminate\Support\Facades\Redirect;
use Paystack;


class CheckoutController extends Controller
{
    public function show(){
        $address = Auth::user()->ownedaddress;
        $itemsInCart = Auth::user()->cartsowned;
        $advert =  Models\AdvertBanner::where('visibility', 'show')->get();
        if(is_null($address)){
            return view('checkout.addresses')->with('advert',  $advert)->with('itemsInCart', $itemsInCart)->with('address', $address);
        }else{
            return redirect()->route('auth.checkout.confirm');
            // option to edit addresses
        }
    }

    public function create(Request $request){
        
        $validations = $request->validate([
            'billing_firstname' => ['bail', 'required', 'string', 'max:30'],
            'billing_lastname' => ['bail', 'required', 'string', 'max:30'],
            'billing_street' => ['bail', 'required', 'string', 'max:255'],
            'billing_apartment' => ['bail', 'nullable', 'string', 'max:255'],
            'billing_country' => ['bail', 'required', 'string', 'max:30'],
            'billing_postalcode' => ['bail', 'required', 'string', 'max:10'],
            'billing_region' => ['bail', 'required', 'string', 'max:30'],
            'billing_city' => ['bail', 'required', 'string', 'max:30'],
            'billing_phone' => ['bail', 'required', 'string', 'max:30'],
            'order_notes' => ['bail', 'nullable', 'string'],
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
        if(is_null($request->order_notes)){

        }else{
            $request->session()->put('order_notes', $request->order_notes);
        }
        
        return redirect()->route('auth.checkout.confirm');


    }

    public function confirm(){
        $advert =  Models\AdvertBanner::where('visibility', 'show')->get();
        $itemsInCart = Auth::user()->cartsowned;
        $userAddress = Auth::user()->ownedaddress;
        if($userAddress->count() > 0){

            return view('checkout.confirmation')->with('advert',  $advert)->with('itemsInCart', $itemsInCart);

        }else{
            return redirect()->route('auth.checkout.show');

        }
        

    }


    //  *  In the case where you need to pass the data from your 
    //  *  controller instead of a form
    //  *  Make sure to send:
    //  *  required: email, amount, reference, orderID(probably)
    //  *  optionally: currency, description, metadata
    //  *  e.g:
    //  *  
    //  */
    // $data = array(
    //     "amount" => 700 * 100,
    //     "reference" => '4g4g5485g8545jg8gj',
    //     "email" => 'user@mail.com',
    //     "currency" => "NGN",
    //     "orderID" => 23456,
    // );
        //'card', 'bank', 'ussd', 'qr', 'mobile_money', 'bank_transfer'
    // return Paystack::getAuthorizationUrl($data)->redirectNow();

    public function redirectToGateway(Request $request){
       

        $getAllCartItems = Models\Cart::where('user_id', Auth::user()->id)->get();
        $order_details = [];

        foreach($getAllCartItems as $singleCart){
            $wholeCart = [
                'product_name' => $singleCart->cartProducts->product_name,
                'product_color' => $singleCart->cartProducts->product_color,
                'product_size' => $singleCart->cartProducts->product_size,
                'product_price' => $singleCart->cartProducts->product_price,
                'quantity' => $singleCart->quantity,
                'subtotal' => $singleCart->subtotal
        ];

            $order_details += [$singleCart->product_id => $wholeCart];
        }

        $order = Models\Order::create([
            'unique_id' => random_int(1000, 99999),
            'user_id' => Auth::user()->id,
            'coupon_id' => session()->get('coupon_id') ?? null,
            'order_details' => json_encode($order_details),
            'total' => $request->amount,
            'coupon_discount' => session()->get('discountTotal') ?? null,
            'order_status' => 'pending payment',
            'order_notes' => session()->get('order_notes') ?? null
        ]);

       // dd($order);

        // $deleteAllCartItems = Models\Cart::where('user_id', Auth::user()->id)->delete();

        $userFullname = Auth::user()->firstname. ' '.Auth::user()->lastname ;
        $paymentPayload = array(
            "channels" => ['card', 'bank', 'ussd', 'qr', 'mobile_money', 'bank_transfer'],
            "amount" => $request->amount,
            "reference" => Paystack::genTranxRef(),
            "email" => Auth::user()->email,
            "label" => $userFullname,
            "currency" => "NGN",
            "orderID" => $order->id,
            "metadata" => json_encode([
                "user_details" => ["firstname" => Auth::user()->firstname,
                                    "lastname" => Auth::user()->lastname],
                "order_details" => $order_details,
                "payment_initialization_time" => Now(),
                "user_id" => Auth::user()->id,
                "order_id" => $order->id

            ])
        
        );

          /**
         * Redirect the User to Paystack Payment Page
         * @return Url
         */

        try{
            return Paystack::getAuthorizationUrl($paymentPayload)->redirectNow();
        }catch(\Exception $e) {
            return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }     

       
    }


    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback(){
        
        $paymentDetails = Paystack::getPaymentData();

        $status = $paymentDetails['status'];
        $message = $paymentDetails['message'];
        $data = $paymentDetails['data'] ;
        $domain = $data['domain'];
        $gateway_response = $data['gateway_response'];
        $amountpaid  = $data['amount'];
        $metaData = $data['metadata'];
        $authorization = $data['authorization'];
        $orderAmount = $data['requested_amount'];
        $detailsPaidWith =  $data['customer'];
        $reference =  $data['reference'];
        $receiptNo = $data['receipt_number'];
        $transaction_date = $data['transaction_date'];
        $paymentChannel = $data['channel'];
        $paidAt = $data['paidAt'];
        $createdAt = $data['createdAt'];
        $currency = $data['currency'];
      

        dd($metaData);
        
    }
}
