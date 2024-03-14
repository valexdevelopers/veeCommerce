<!doctype html>
<html>
    <head>
        <title>Order Details | Admin</title>
        @include('layouts.adminHeadContent')
    </head>
    <style>
        
    </style>
    <body >
        <div class="page-wrapper">
            <section >
                <div class="rows mother-row">
                    @include('layouts.adminmenu')

                    <!-- main page wrap -->
                    <div class="main-page-wrapper">
                        <!-- main page: header wrap row  -->
                        @include('layouts.adminStickyHeader')
                        
                        <!-- main page: roles-wrap wrap row  -->
                        <section class="scroll-y">
                            <div>
                                <div class="header-details">
                                    <div>
                                        <div class="order-id-wrap">
                                            <h6 class="" style="color: #57565d ;">Order #{{ $order->unique_id }} </h6>
                                            @php
                                                if($order->order_status == 'pending payment'){
                                                    $color = 'color-yellow';
                                                    $bgcolor = 'yellow-bg';
                                                }elseif($order->order_status == 'out for delivery'){

                                                    $color = 'color-blue';
                                                    $bgcolor = 'blue-bg';

                                                }elseif($order->order_status == 'delivered'){
                                                    $color = 'color-green';
                                                    $bgcolor = 'green-bg';

                                                }elseif($order->order_status == 'payment failed'){
                                                    $color = 'color-red';
                                                    $bgcolor = 'red-bg';
                                                }
                        
                                            @endphp
                                            <span class="{{ $bgcolor }} {{ $color }} button-2">{{ $order->order_status }}</span>

                                            {{-- <span class="blue-bg color-blue button-2">Pickup from store</span> --}}
                                        </div>
                                        
                                       <small class=" order-extra-details">{{ $order->created_at->format('M d Y H:i:s') }}</small>
                                    </div>
                                    <div class="delete-order-container">
                                        <div><a href="#" class="red-bg color-red button-1 no-text-deco">Delete Order</a></div>
                                    </div>
                                </div>
                                <div class="padding-5">
                                    
                                    <div class="lg-grid-70-30 ">
                                        <div class=" grid-col-70 ">
                                            <div class="with-box-shadow white-bg rounded-edges padding-20">
                                                <div class=""><h6 class="product-name">Order details</h6></div>
                                                <div>
                                                    <table class="table product-table">
                                                        <thead>
                                                            <tr>
                                                                <td>products</td>
                                                                <td>price</td>
                                                                <td>QTY</td>
                                                                <td>Total</td>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                                $orderProducts = json_decode($order->order_details);

                                                            @endphp
                                                            
                                                            @foreach($orderProducts as $key => $singleProduct)
                                                                @php
                                                                    $product = App\Models\Product::find($key);
                                                                @endphp
                                                                <tr >
                                                                    <td>
                                                                        <div class="product">
                                                                            <div class="product-image-wrap">
                                                                                <div class="product-avatar rounded-image-wrap">
                                                                                    <a href="{{asset('storage/'.$product->product_image_1) }}" target="_blank"><img src="{{asset('storage/'.$product->product_image_1) }}" alt="product-image" class="product-image"></a>
                                                                                </div>
                                                                                
                                                                            </div>
                                                                            <div class="d-flex flex-column">
                                                                                <h6 class="product-name mb-0">{{ $singleProduct->product_name }}</h6>
                                                                                <small class="product-description-small">{{ $product->productBrands->brand_name }}</small>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                    </td>
                                                                    
                                                                    <td class="grey-text" style="color: #6f6b7d;"><span>₦{{number_format($product->product_price, 2)  }}</span> </td>
                                                                
                                                                    <td class="grey-text"> <span>{{$singleProduct->quantity }}</span></td>
                                                                    <td class="grey-text" style="color: #6f6b7d;"><span>₦{{number_format($singleProduct->subtotal, 2)  }}</span> </td>
                                                                </tr>
                                                            @endforeach
                                                            
                                                            
                                                            
                                                        </tbody>
                                                    </table>
                                                </div>
                                                
                                            </div>

                                            
                                            
                                            
                                        </div>


                                        <div class="grid-col-30 " >
                                            <div class="with-box-shadow white-bg rounded-edges padding-20">
                                                <div ><h6 class="product-name">Customer details</h6></div>
                                                <div class="row">
                                                    <div class="product">
                                                        <div class="">
                                                            <div class="product-avatar rounded-image-wrap">
                                                                <img src="{{asset('admincontent/images/avatars/12.png') }}" alt="product-image" class="user-image rounded-image">
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="d-flex flex-column">
                                                            <h6 class="product-name mb-0" style="text-transform: capitalize">{{$order->orderUser->firstname }} {{$order->orderUser->lastname }}</h6>
                                                            <small class="product-description-small">ID: #{{$order->orderUser->unique_id }}</small>
                                                        </div>
                                                    </div>

                                                    <div class="product pt-30">
                                                        <div class="">
                                                            <div class="d-flex justify-content-center rounded-cart-wrap green-bg rounded-image">
                                                                <i class="bi bi-cart3 color-green"></i>
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="d-flex mt-10">
                                                            <h6 class="product-name mb-0">{{$order->orderUser->purchases->count() }} Orders</h6>
                                                           
                                                        </div>
                                                    </div>

                                                    <div class="pt-30">
                                                        <div class="contact-order-details  lg-grid-70-30">
                                                            <p style="color: #6f6b7d;">Contact info</p>
                                                            <a href="#" class="color-green no-text-deco">View</a>
                                                        </div>
                                                        <div class="contact-details">
                                                            <p class="color-blue">Email:&nbsp;{{$order->orderUser->email }}</p>
                                                            <p class="color-blue">Mobile:&nbsp;{{$order->orderUser->phone }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>

                                        
                                            <div class=" mt-20 mt-20-sm with-box-shadow white-bg rounded-edges padding-20">
                                                
                                                <div class="row">
                                                    <div >
                                                        <div class="contact-order-details  lg-grid-70-30">
                                                            <h6 class="product-name">Delivery address</h6>
                                                            <a href="#" class="color-green no-text-deco">View</a>
                                                        </div>
                                                        <div class="contact-details mt-10">
                                                            <p style="color: #6f6b7d;text-transform:capitalize;" >{{ $order->orderUser->ownedaddress->street }} </p>
                                                            <p style="color: #6f6b7d;text-transform:capitalize;">{{ $order->orderUser->ownedaddress->town }}  </p>
                                                            <p style="color: #6f6b7d;text-transform:capitalize;">{{ $order->orderUser->ownedaddress->region }} </p>
                                                            <p style="color: #6f6b7d;text-transform:capitalize;">{{ $order->orderUser->ownedaddress->country }} {{ $order->orderUser->ownedaddress->postal_code }}</p>
                                                        </div>
                                                        <div class="contact-order-details  lg-grid-70-30 mt-30">
                                                            {{-- {{ $order->orderUser->purchases->channel }} --}}
                                                            <h6 class="product-name">Mastercard</h6>
                                                            
                                                        </div>
                                                        <div>
                                                            <p>Card Number: ******4291</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                                
                            </div>
                            
                            <div>&nbsp;</div>
                            <div>&nbsp;</div>
                        </section>
                    </div>
                </div>

                <!-- extra details for notification, available on click -->
                @include('layouts.adminNotification')
                <!-- extra details for notification ends here, available on click -->
                <!-- extra details for profile, available on click -->
                @include('layouts.adminProfile')
                <!-- extra details for profile ends here, available on click -->
            </section>
        </div>

        @include('layouts.adminFooter')
    </body>
    
</html>