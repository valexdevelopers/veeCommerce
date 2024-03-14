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
                                <h1 class="text-center" style="color: #0b7b3e; margin-top:10px">My Cart</h1>
                                @if(Session::has('message'))
                                    <div class="alert {{ Session::get('message-color') }} alert-dismissible fade show" role="alert">
                                        <strong>{{ Session::get('message') }}</strong> 
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif
                                <div class="cart-body-wrap">
                                    <div class="not-added-wrap">
                                        <div class="not-added-yet">
                                            <div class="notadded-icon"> <i class="bi bi-cart4"></i></div>
                                            <h3>You have not added any products in your cart</h3>
                                            <p>products in your cart will show up here as you add them, go to shop to add products to cart </p>


                                            <div class="not-added-add-now">
                                                <a href="{{ route('store.shop') }}">Shop Now</a>
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