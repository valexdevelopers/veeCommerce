<!DOCTYPE html> 
<html>
    <head>
        <title>My Order | Vee Commerce </title>
        @include('layouts.storeHeadContent')
    
    
    </head>
    <body>
        <div class="wrapper">
            <div class="page-wrapper">
                @include('layouts.storeHeader')
                <section class="dasboard-section" >
                    <div class="row-l dashboard-wrap">
                        <div class="dashboard-links">
                            <ul>
                                <li class="d-links "><a href="{{ route('auth.user.show') }}"  > <i class="bi bi-house-door"></i> Dashboard</a></li>
                                <li class="d-links active"><a href="{{ route('auth.user.orders') }}" class="active-link"><i class="bi bi-bag"></i> My Orders</a></li>
                                
                                <li class="d-links"><a href="{{ route('auth.user.address') }}" ><i class="bi bi-house"></i>  Addresses</a></li> 
                                <li class="d-links"><a href="{{ route('auth.user.wishlist') }}" > <i class="bi bi-heart"></i> Wishlist</a></li>
                                
                                <li class="d-links"><a href="{{ route('auth.user.profile') }}" > <i class="bi bi-person"></i> Manage Profile</a></li>
                                <li class="d-links"><a href="{{ route('auth.user.showlogoutform') }}" > <i class="bi bi-box-arrow-right"></i> Logout</a></li>
                            </ul>
                        </div>
                        <div class="otherinfo">
                            <div class="dashboard-intro">
                                <h1>My Orders</h1>
                                <p ></p>
                               
                            </div>
                            <table class="table product-table">
                                <thead>
                                    <tr>
                                        <td>products</td>
                                        <td>price</td>
                                        <td>color</td>
                                        <td>size</td>
                                        <td>QTY</td>
                                        <td>Total</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach($order_details as $product_id => $product_details)

                                        @php
                                            $product = App\Models\Product::find($product_id);
                                        @endphp
                                    <tr >
                                        <td>
                                            <div class="product">
                                                <div class="product-image-wrap">
                                                    <div class="product-avatar rounded-image-wrap">
                                                        <a href="{{asset('storage/'.$product->product_image_1)  }}" target="_blank"><img src="{{asset('storage/'.$product->product_image_1)  }}" alt="product-image" class="order-image"></a>
                                                    </div>
                                                    
                                                </div>
                                                <div class="d-flex flex-column">
                                                    <h6 class="product-name mb-0">{{ $product_details->product_name }}</h6>
                                                    <small class="product-description-small">{{ $product->productBrands->brand_name }}</small>
                                                </div>
                                            </div>
                                            
                                        </td>
                                        
                                        <td class="grey-text" style="color: #6f6b7d;"><span>₦{{number_format($product_details->product_price, 2)  }}</span> </td>
                                        <td class="grey-text"> <span>{{ $product_details->product_color }}</span></td>
                                        <td class="grey-text"> <span>{{ $product_details->product_size }}</span></td>
                                        <td class="grey-text"> <span>{{ $product_details->quantity }}</span></td>
                                        <td class="grey-text" style="color: #6f6b7d;"><span>₦{{number_format($product_details->subtotal, 2)  }}</span> </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>

                @include('layouts.storeFooter')
                <!--Footer ends here-->
            </div>
        </div>
        
        @include('layouts.footer')
    </body>
</html>