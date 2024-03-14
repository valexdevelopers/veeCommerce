<!DOCTYPE html> 
<html>
    <head>
        <title>{{ $product->product_name }} | Vee Commerce</title>
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
                                <div class="cart-body-wrap ">
                                    <div class="cart-details-wrap width-50-lg width-100-sm ">
                                        <ul class="cart-details-header width-100-percent display-flex space-between">
                                            <li class="cart-pages width-33-percent "> <a href="{{ route('home') }}" class="cart-pages-link">Home</a></li>
                                            <li class="cart-pages width-33-percent"><a href="#" class="cart-pages-link">Products</a></li>
                                            <li class="cart-pages width-33-percent cart-list-active">Add to Cart</li>
                                        </ul>

                                        <div class="single_product_slider-wrap cart-items-wrap width-100-percent">
                                            
                                            <div class="single_product_sliding-wrapper width-100-percent">
                                               
                                                <input class="slider-btn" name="slider-btn" type="radio" id="slider1"/>
                                                <input class="slider-btn" name="slider-btn" type="radio"  id="slider2"/>
                                                <input class="slider-btn" name="slider-btn" type="radio" id="slider3"/>
                                                <input class="slider-btn" name="slider-btn" type="radio"  id="slider4"/>
                                                <input class="slider-btn" name="slider-btn" type="radio" id="slider5"/>

                                                <!--calculate number -->
                                                <div class="single_product_slider-wrapper show_large_product_image" id="slider">
                                                   
                                                    <div class="single_product_slides">
                                                        <a href="{{asset('storage/'.$product->product_image) }}" target="_blank" rel="noopener">
                                                            <img src="{{asset('storage/'.$product->product_image_1) }}"  />
                                                        </a>
                                                    </div>
                                                    @empty($product->product_image_2)
                                                        {{-- show nothing --}}
                                                    @else
                                                        <div class="single_product_slides">
                                                            <a href="{{asset('storage/'.$product->product_image_2) }}" target="_blank" rel="noopener">
                                                                <img src="{{asset('storage/'.$product->product_image_2) }}"  />
                                                            </a>
                                                        </div>
                                                    @endempty

                                                    @empty($product->product_image_3)
                                                        {{-- show nothing --}}
                                                    @else
                                                        <div class="single_product_slides">
                                                            <a href="{{asset('storage/'.$product->product_image_3) }}" target="_blank" rel="noopener">
                                                                <img src="{{asset('storage/'.$product->product_image_3) }}"  />
                                                            </a>
                                                        </div>
                                                    @endempty

                                                    @empty($product->product_image_4)
                                                        {{-- show nothing --}}
                                                    @else
                                                        <div class="single_product_slides">
                                                            <a href="{{asset('storage/'.$product->product_image_4) }}" target="_blank" rel="noopener">
                                                                <img src="{{asset('storage/'.$product->product_image_4) }}"  />
                                                            </a>
                                                        </div>
                                                    @endempty
                                                    
                                                    @empty($product->product_image_5)
                                                        {{-- show nothing --}}
                                                    @else
                                                        <div class="single_product_slides">
                                                            <a href="{{asset('storage/'.$product->product_image_5) }}" target="_blank" rel="noopener">
                                                                <img src="{{asset('storage/'.$product->product_image_5) }}"  />
                                                            </a>
                                                        </div>
                                                    @endempty
                                                   
                                                </div>

                                                 <!--manual navigation start-->
                                                <div class="navigation-manual_with_image">

                                                    <label for="slider1" class="manual-btn_with_image">
                                                        <img id="single_product_image" src="{{asset('storage/'.$product->product_image_1) }}"  />
                                                    </label>

                                                    @empty($product->product_image_2)
                                                        {{-- show nothing --}}
                                                    @else
                                                        <label for="slider2" class="manual-btn_with_image">
                                                            <img id="single_product_image" src="{{asset('storage/'.$product->product_image_2) }}"  />
                                                        </label>
                                                    @endempty
                                                    
                                                    @empty($product->product_image_3)
                                                        {{-- show nothing --}}
                                                    @else
                                                        <label for="slider3" class="manual-btn_with_image">
                                                            <img id="single_product_image" src="{{asset('storage/'.$product->product_image_3) }}"  />
                                                        </label>
                                                    @endempty
                                                    
                                                    @empty($product->product_image_4)
                                                        {{-- show nothing --}}
                                                    @else
                                                        <label for="slider4" class="manual-btn_with_image">
                                                            <img id="single_product_image" src="{{asset('storage/'.$product->product_image_4) }}"  />
                                                        </label>
                                                    @endempty

                                                    @empty($product->product_image_5)
                                                        {{-- show nothing --}}
                                                    @else
                                                        <label for="slider3" class="manual-btn_with_image">
                                                            <img id="single_product_image" src="{{asset('storage/'.$product->product_image_5) }}"  />
                                                        </label>
                                                    @endempty
                                                    
                                                </div>
                                                <!--manual navigation end-->
                                                
                                                    
                                                    
                                            </div>

                                                
                                           
                                        </div>
                                    </div>

                                    <div class="single_product_wrap width-50-lg width-100-sm " >
                                        <div>
                                            <h4 class="thick single-product-description" style="text-transform: capitalize">{{ $product->product_name }} - {{ $product->productBrands->brand_name }}</h4>
                                            <p class="product-rating"><i class="bi-star-fill star"></i><i class="bi-star-fill star"></i><i class="bi-star star"></i><i class="bi-star star"></i><i class="bi-star star"></i> (12)</p>
                                            @empty($product->productDetails->about)
                                                
                                            @else
                                                <p >
                                                    <input type="radio" class="btn-check open-description" name="open-description" id="open-description" autocomplete="off" >
                                                    <input type="radio" class="btn-check close-description" name="open-description" id="close-description" autocomplete="off" checked>   
                                                    <span class="add-to-cart-product-description">
                                                       {{ json_decode($product->productDetails->about)  }}
                                                    </span>
                                                    <label style="color: blue;"  class="readmore-product-description" for="open-description">Read More</label>
                                                    <label style="color: red;"  class="close-readmore-product-description" for="close-description">Close</label>
                                                </p>

                                            @endempty
                                            
                                            
                                        </div>
                                        <div class="brand-wrap">
                                            <div>
                                                
                                                <label class="btn brand-name-product" for="option1" style="text-transform: capitalize">{{ $product->productBrands->brand_name }}</label>
                                            </div>
                                        </div>
                                        <div class="product-price">
                                            
                                            <p>
                                                @empty($product->product_discount_price)
                                                    <span class="thick">₦{{ number_format($product->product_price, 2) }}</span>&nbsp;
                                                @else
                                                    <span class="thick">₦{{ number_format($product->product_discount_price) }}</span>&nbsp;
                                                    
                                                @endempty
                                                
                                                @if($product->productInventory->stock_quantity > 0)
                                                    <sup class="stock in-stock">In Stock</sup> 
                                                @else
                                                    <sup class="stock out-of-stock">In Stock</sup> 
                                                @endif

                                                &nbsp; &nbsp;  

                                                @empty($product->product_discount_price)

                                                @else
                                                    <s>₦{{ number_format($product->product_price) }}</s>
                                                @endempty
                                            </p>
                                        </div>
                                        <form id="add_to_cart_form" method="post" action="{{ route('store.carts.create') }}">
                                            @csrf

                                            @empty(json_decode($product->productDetails->technical_details)->product_color)

                                            @else
                                                <div class="product-color-wrap">
                                                    <div class="product-color-header">
                                                        <p>Colors</p>
                                                    </div>
                                                    <div class="product-colors-choice">
                                                        @php
                                                            $colors = json_decode($product->productDetails->technical_details)->product_color;
                                                            $colors = json_decode($colors);
                                                        @endphp
                                                        
                                                        @foreach($colors as $color)
                                                        <div>
                                                            <input value="{{ $color }}" type="radio" class="btn-check" name="product_color" id="product_color_{{ $color }}" autocomplete="off" checked>
                                                            <label class="btn " for="product_color_{{ $color }}" style="text-transform: capitalize">{{ $color }}</label>
                                                        </div>
                                                        @endforeach
                                                        
                                                    </div>
                                                    
                                                </div>
                                            @endempty

                                            

                                            @empty(json_decode($product->productDetails->technical_details)->product_size)

                                            @else
                                                <div class="product-color-wrap margin-top-20">
                                                    <div class="product-color-header">
                                                        <p>Sizes</p>
                                                    </div>
                                                
                                                    <div class="product-colors">
                                                        @php
                                                            $sizes = json_decode($product->productDetails->technical_details)->product_size;
                                                            $sizes = json_decode($sizes);
                                                        @endphp
                                                        
                                                        @foreach($sizes as $size)
                                                        <div>
                                                            <input type="radio" class="btn-check" name="product_size" id="product_size_{{ $size }}" autocomplete="off" checked>
                                                            <label class="btn " for="product_size_{{ $size }}" style="text-transform: capitalize">{{ $size }}</label>
                                                        </div>
                                                        
                                                        @endforeach
                                                    </div>    
                                                </div>
                                            @endempty
                                            
                                            
                                            <div class="margin-top-20 product-add_to_cart_wrap width-100-percent f-right">
                                                
                                                <div class="product-quantity-wrap ">
                                                    <button class="quantity-btn" type="button" role="button" id="minus" onclick="deduct()"> - </button>
                                                    <input id="quantity" name="quantity" class="product-quantity" value="1" type="number" min="1" step="1" autocomplete="off" size="4">
                                                    <button class="quantity-btn" type="button" role="button" id="plus" onclick="add()"> + </button>
                                                </div>
                                                

                                                <div class=" form-row product-add-to-cart">
                                                    <input  type="hidden" name="product_id" value="{{ $product->id }}">
                                                    @empty($product->product_discount_price)
                                                        <input  type="hidden" name="product_price" value="{{ $product->product_price }}">
                                                    @else
                                                        <input  type="hidden" name="product_price" value="{{ $product->product_discount_price}}">
                                                        
                                                    @endempty
                                                    
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            @if($product->productInventory->stock_quantity > 0)
                                                                <button name="add-to-cart" style="background-color: black; color: white;" class=" coupon-btn coupon-form-design btn-with-side-padding sm-font-10 " role="button" type="submit">Add to cart</button>    
                                                            @else
                                                                <button disabled name="add-to-cart" style="background-color: black; color: white;  opacity: 0.6; pointer-events: none;" class=" coupon-btn coupon-form-design btn-with-side-padding sm-font-10 " role="button" type="">Add to cart</button>    
                                                            @endif
                                                            
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 remove-margin-and-padding">
                                                        <div class="form-group">
                                                            <button name="save-for-later" class="coupon-btn  sm-font-10  coupon-form-design btn-with-side-padding" role="button" type="submit"> <i class="bi bi-heart"></i>&nbsp; Save for later</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                
                                                
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                @include('layouts.storeFooter')
                <!--Footer ends here-->
            </div>
        </div>
        <script type="text/javascript">
            const minus = document.getElementById('minus')
            const plus = document.getElementById('plus')
            const quantity = document.getElementById('quantity')
        
            function deduct(){
                var currentquantity = quantity.value
                var newquantity = currentquantity - 1
                if(currentquantity == 1){
                    var newquantity = 1 
                }else{
                    var newquantity = currentquantity - 1
                }
                quantity.setAttribute('value', newquantity)
            }
        
            function add(){
                var currentquantity = parseInt(quantity.value)
                var newquantity = currentquantity + 1
                quantity.setAttribute('value', newquantity)
            }
        
        </script>
       
       @include('layouts.footer')
    </body>
</html>