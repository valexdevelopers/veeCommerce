<!DOCTYPE html> 
<html>
    <head>
        <title>Cart | Vee Commerce </title>
        @include('layouts.storeHeadContent')
    
    
    </head>
    <body>
        <div class="wrapper">
            <div class="page-wrapper">
                {{-- store header contents  --}}
                @include('layouts.storeHeader')
                <section class="cart-section">
                    <div class="row-l">
                        <div class="cart-wrap">
                            <div class="cart-header-wrap width-100-percent ">
                                <h1 class="text-center">My Cart</h1>
                                @if(Session::has('message'))
                                    <div class="alert {{ Session::get('message-color') }} alert-dismissible fade show" role="alert">
                                        <strong>{{ Session::get('message') }}</strong> 
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif
                                <div class="cart-body-wrap">
                                    <div class="cart-details-wrap">
                                        <ul class="cart-details-header width-100-percent display-flex space-between">
                                            <li class="cart-pages-lg cart-pages width-33-percent cart-list-active">Cart Overview</li>
                                            <li class="cart-pages-lg cart-pages width-33-percent">Billing + Shipping</li>
                                            <li class="cart-pages-lg cart-pages width-33-percent">Confirmation</li>
                                        </ul>

                                        <div class="cart-items-wrap width-100-percent">
                                            <form method="post" action="{{ route('store.carts.patch') }}" id="quantity-form" class="width-100-percent">
                                                @method('patch')
                                                @csrf
                                                <div class="width-100-percent">
                                                    <table class="cart-table width-100-percent">

                                                        @foreach($itemsInCart as $singleitem)
                                                            <tr class="cart-product-row table-row-white">
                                                                <td class="f-left">
                                                                    <div class="cart-product-description-wrap width-100-percent ">
                                                                        <div class="cart-product-image-wrap f-left">
                                                                            <a href="#" class="cart-product-image-link">
                                                                                <img src="{{asset('storage/'.$singleitem->cartProducts->product_image_1) }}" >
                                                                            </a>
                                                                        </div>
                                                                        <div class="cart-product-details-wrap f-right">
                                                                            <div class="cart-product-details">
                                                                                <p class="cart-product-name "><a href="{{ route('store.products.view', $product_id = $singleitem->product_id ) }}" class="cart-product-details-design">{{$singleitem->cartProducts->product_name}}</a></p>
                                                                                <p class="cart-delivery-batch cart-product-details-design">Delivery Batch:
                                                                                    @if($singleitem->cartProducts->productInventory->stock_quantity > 0)
                                                                                        
                                                                                        <span class="stock in-stock">In Stock</span>
                                                                                     @else
                                                                                        <span class="stock out-of-stock">Out of Stock</span>
                                                                                     @endif
                                                                                    
                                                                                </p>
                                                                                <p class="cart-price cart-product-details-design">₦&nbsp;{{ number_format($singleitem->price, 2) }} X {{$singleitem->quantity}}</p>
                                                                                @if($singleitem->size ==null && $singleitem->color== null)

                                                                                @else
                                                                                   
                                                                                    @empty($singleitem->size)
                                                                                        
                                                                                    @else
                                                                                            <div class="product-colors">
                                                                                                <div>
                                                                                                    <input type="radio" class="btn-check" name="{{$singleitem->cartProducts->product_name}}" id="{{$singleitem->cartProducts->product_name}}" autocomplete="off" checked>
                                                                                                    <label class="btn " for="{{$singleitem->cartProducts->product_name}}">xxs</label>
                                                                                                </div>
                                                                                            </div>
                                                                                            &nbsp;
                                                                                    @endempty
                                                                                       
                                                                                    
                                                                                    @empty($singleitem->color)
                                                                                        
                                                                                    @else
                                                                                        <p class="wishlist-variants">
                                                                                            <span>Color:</span> <span>{{ $singleitem->color }}</span>
                                                                                        </p>
                                                                                        
                                                                                    @endempty
                                                                                @endif
                                                                            </div>
                                                                            
                                                                            <div class="product-quantity-wrap margin-top-20">
                                                                                <button class="quantity-btn" type="button" role="button" id="minus" onclick="deduct('{{ $singleitem->id }}')"> - </button>
                                                                                <input id="quantity_{{ $singleitem->id }}" name="cart[{{$singleitem->id}}][quantity]" class="product-quantity" value="{{$singleitem->quantity}}" type="number" min="1" step="1" autocomplete="off" size="4">
                                                                                <button class="quantity-btn" type="button" role="button" id="plus" onclick="add('{{ $singleitem->id }}')"> + </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </td>
                                                                <td class="f-right">
                                                                    <div class="width-100-percent space-between">
                                                                        <span class="cart-product-subtotal">₦&nbsp;{{ number_format($singleitem->subtotal, 2) }}&nbsp;</span>
                                                                        @if($singleitem->quantity == 1)
                                                                        <a href="{{ route('store.carts.delete', $id = $singleitem->id) }}" class="cart-delete-product"><i class="bi bi-trash"></i></a>
                                                                        @endif
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        
                                                        <tr class="table-row-grey">
                                                            
                                                            <td><div class="cart-update-btn-wrap"><button  type="submit" class="cart-update-btn">Update Cart</button></div> </td>
                                                           
                                                        </tr>
                                                    </table>
                                                    
                                                </div>

                                                
                                            </form>
                                        </div>
                                    </div>



                                    <div class="cart-pricing-wrap">
                                        <table class="cart-pricing-table">
                                            <tr >
                                                <th>Subtotal</th>
                                                <td>₦&nbsp;{{ number_format($itemsInCart->sum('subtotal'), 2) }}</td>
                                            </tr>
                                            <tr>
                                                <th>Shipping</th>
                                                <td><p>Free shipping (DHL EXPRESS)</p>
                                                    <p>Shipping options will be updated during checkout.</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Total</th>
                                                <td class="cart-total">
                                                    @if(Session::has('discountTotal'))
                                                        ₦&nbsp;{{ number_format($itemsInCart->sum('subtotal') - Session::get('discountTotal'), 2)  }}
                                                    @else
                                                        ₦&nbsp;{{ number_format($itemsInCart->sum('subtotal'), 2) }}
                                                    @endif
                                                   

                                                </td>
                                            </tr>
                                        </table>
                                        <div class="coupon-wrap">
                                            <form id="Coupon-form" method="post" action="{{ route('store.coupon.apply') }}">
                                                @csrf
                                                <div class="coupon-form-group width-100-percent">
                                                    <input required name="coupon_code" class="coupon-form-input coupon-form-design" type="text"  placeholder="Coupon Code">
                                                    <button class="coupon-btn coupon-form-design" role="button" type="submit">Apply Coupon</button>
                                                </div>
                                            </form>
                                            <div class="cart-proceed-wrap width-100-percent">
                                                @auth
                                                <a href="{{ route('auth.checkout.show') }}" class="cart-proceed-btn width-100-percent" >Proceed to checkout</a>
                                                @endauth
                                                @guest
                                                <a href="{{ route('login') }}" class="cart-proceed-btn width-100-percent" >Proceed to checkout</a>
                                                @endguest
                                            </div>
                                            
                                        </div>
                                    </div>

                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

               @include('layouts.storeFooter')
            </div>
        </div>
        {{-- essential javascript files --}}
        <script type="text/javascript">
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

        </script>
        @include('layouts.footer')
    </body>
</html>