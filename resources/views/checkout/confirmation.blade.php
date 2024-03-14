<!DOCTYPE html> 
<html>
    <head>
        <title>Checkout | Vee Commerce</title>
        @include('layouts.storeHeadContent')
    </head>
    <body>
        <div class="wrapper">
            <div class="page-wrapper">
                @include('layouts.storeHeader')
                <section class="cart-section">
                    <div class="row-l">
                        <div class="cart-wrap">
                            <div class="cart-header-wrap width-100-percent ">
                                <h1 class="text-center">Checkout</h1>
                                @if($itemsInCart->count() > 0)
                                <div class="cart-body-wrap">
                                    <div class="cart-details-wrap ">
                                        <ul class="cart-details-header width-100-percent display-flex space-between">
                                            <li class="cart-pages width-33-percent cart-list-active">Cart Overview</li>
                                            <li class="cart-pages width-33-percent cart-list-active">Billing + Shipping</li>
                                            <li class="cart-pages width-33-percent cart-list-active">Confirmation</li>
                                        </ul>

                                        <div class="cart-items-wrap width-100-percent">
                                            @if(Session::has('message'))
                                            <div class="alert {{ Session::get('message-color') }} alert-dismissible fade show" role="alert">
                                                <strong>{{ Session::get('message') }}</strong> 
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                            @endif
                                            <form method="post" id="quantity-form" class="width-100-percent">
                                                @csrf
                                                @method('PATCH')
                                                <div class="width-100-percent">
                                                    <table class="cart-table width-100-percent">

                                                        @foreach($itemsInCart as $singleItem)
                                                            <tr class="cart-product-row table-row-white">
                                                                <td class="f-left">
                                                                    <div class="cart-product-description-wrap width-100-percent ">
                                                                        <div class="cart-product-image-wrap f-left">
                                                                            <a href="#" class="cart-product-image-link">
                                                                                <img src="{{asset('storage/'.$singleItem->cartProducts->product_image_1)}}" >
                                                                            </a>
                                                                        </div>
                                                                        <div class="cart-product-details-wrap f-right">
                                                                            <div class="cart-product-details">
                                                                        <p class="cart-product-name "><a href="#" class="cart-product-details-design">{{ $singleItem->cartProducts->product_name }}</a></p>
                                                                                <p class="cart-delivery-batch cart-product-details-design">Delivery Batch:
                                                                                    @if($singleItem->cartProducts->productInventory->stock_quantity > 0)
                                                                                        
                                                                                        <span class="stock in-stock">In Stock</span>
                                                                                     @else
                                                                                        <span class="stock out-of-stock">Out of Stock</span>
                                                                                     @endif
                                                                                </p>
                                                                                <p class="cart-price cart-product-details-design">₦{{ number_format($singleItem->cartProducts->product_price, 2) }} X {{ $singleItem->quantity  }}</p>
                                                                            </div>
                                                                           
                                                                            
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </td>
                                                                <td class="f-right">
                                                                    <div class="width-100-percent space-between">
                                                                        <span class="cart-product-subtotal">₦{{ number_format($singleItem->subtotal, 2) }}&nbsp;&nbsp;</span>&nbsp;
                                                                       
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        
                                                        @endforeach
                                                        
                                                        
                                                    </table>
                                                    
                                                </div>

                                                
                                            </form>
                                        </div>
                                    </div>



                                    <div class="cart-pricing-wrap ">
                                        
                                        <table class="cart-pricing-table ">
                                            <tr >
                                                <th>Subtotal</th>
                                                <td>
                                                    @if(Session::has('discountTotal'))
                                                        ₦&nbsp;{{ number_format($itemsInCart->sum('subtotal') - Session::get('discountTotal'), 2)  }}
                                                    @else
                                                        ₦&nbsp;{{ number_format($itemsInCart->sum('subtotal'), 2) }}
                                                    @endif
                                                    </td>
                                            </tr>
                                            <tr>
                                                <th>Shipping</th>
                                                <td>₦1,700</td>
                                            </tr>
                                            <tr>
                                                <th>Total</th>
                                                <td class="cart-total">₦{{ number_format($itemsInCart->sum('subtotal') - Session::get('discountTotal') + 1700, 2) }}</td>
                                            </tr>
                                            <caption> Payments are made via paystack, accepted payment methods includes credit cards, bank transfer, ussd, bank payments as well as pos payments</caption>
                                        </table>

                                       
                                        <div class="width-90-percent f-right">
                                            <form id="paymentform" method="POST" action="{{ route('auth.checkout.redirectToGateway') }}">
                                                @csrf
                                                <input value="{{ $itemsInCart->sum('subtotal') + 1700 }}" name="amount" type="hidden" />
                                                
                                                <div class=" width-100-percent">
                                                    <a id="place_order" role="button" class="cart-proceed-btn width-100-percent" onclick="placeOrder()" >Pay</a>
                                                </div>
                                            </form>
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                                @else
                                <div class="cart-body-wrap display-flex space-between"><p>You have no items in cart, shop items</p></div>
                                @endif
                            </div>
                        </div>
                    </div>
                </section>

                @include('layouts.storeFooter')
                <!--Footer ends here-->
            </div>
        </div>
        <script>
            const minus = document.getElementById('minus')
            const plus = document.getElementById('plus')
            

            function deduct(cartId){
                const quantity = document.getElementById(`quantity_${cartId}`)
                var currentquantity = quantity.value

                if(currentquantity == 1){
                    var newquantity = 1 
                }else{
                    var newquantity = currentquantity - 1
                }
                
                quantity.setAttribute('value', newquantity)
            }

            function add(cartId){
                const quantity = document.getElementById(`quantity_${cartId}`)
                var currentquantity = parseInt(quantity.value)
                var newquantity = currentquantity + 1
                quantity.setAttribute('value', newquantity)
            }

            function placeOrder(){
               document.getElementById("paymentform").submit()
            }

        </script>
       @include('layouts.footer')
    </body>
</html>