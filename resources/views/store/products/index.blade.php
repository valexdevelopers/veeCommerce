<!DOCTYPE html> 
<html>
    <head>
        <title>Home | Vee Commerce </title>
        @include('layouts.storeHeadContent')
    </head>
    <body>
        <div class="wrapper">
            <div class="page-wrapper">
                @include('layouts.storeHeader')
                <section class="black deals-section">
                    <div class="row-l" >
                        <div class="stock-deals-wrapper" >
                            <div class="stock-deals-header"> <h3 class="stock-deals-h">Shop</h3></div>
                            <div class="stock-deals-set">
                                @if($products->count() > 0)
                                    @foreach($products as $product)
                                        <div class="stock-deals stock-deals-category">
                                            <a href="{{ route('store.products.view', $product_id = $product->id)  }}" class="product-link" >
                                                <div class="limited-stock-product-image"><img src="{{asset('storage/'.$product->product_image_1) }}"></div>
                                            
                                                @empty($product->product_discount_price)
                                                    <div class="limited-stock-price-wrap">
                                                        <p class="description">{{ $product->product_name }}</p>
                                                        <p class="price">&#x20A6; {{ number_format($product->product_price) }}</p>
                                                        <a href="{{ route('store.products.view', $product_id = $product->id ) }}" class="add-to-cart-home">Add to Cart</a>
                                                        
                                                    </div>
                                                @else
                                                    @php
                                                            
                                                        $discountedAmount = $product->product_price - $product->product_discount_price;
                                                        $percetageDecreaseForoneNaira = 100/$product->product_price;
                                                        $totalPercentageDecrease = $discountedAmount * $percetageDecreaseForoneNaira;
                                                    
                                                    @endphp
                                                    <div class="percentage sales-discount">
                                                
                                                        <p class="perc">-{{ ceil($totalPercentageDecrease) }}%</p>
                                                    </div>
                                                    <div class="limited-stock-price-wrap">
                                                        <p class="description">{{ $product->product_name }}</p>
                                                        <p class="price">&#x20A6; {{ number_format($product->product_discount_price) }} <span class="price-cancelled" style="font-weight:500">&#x20A6; {{ number_format($product->product_price) }}</span></p>
                                                        <a href="{{ route('store.products.view', $product_id = $product->id ) }}" class="add-to-cart-home">Add to Cart</a>
                                                        
                                                    </div>
                                                @endempty
                                            </a>
                                        </div>

                                    @endforeach
                                @endif
                                
                                
                                
                            </div>
                            
                        </div>
                    </div>
                </section>
                @if($recommendedProducts ->count() > 10)
                    <section class="black flash-sales-section">
                        <div class="row-l" id="viewableWidth">
                            <div class="flash-sales-wrapper">
                                <div class="flash-sales-header"> <h3 class="flash-sales-h">Recommended Products</h3></div>
                                <div class="flash-sales-set" id="flash_sales_set" >
                                    @foreach($recommendedProducts as $onerecommendedProducts)
                                        <div class="flash-sales flash-sales-category" id="flash-sales">
                                            
                                            <a href="{{ route('store.products.view', $product_id = $onerecommendedProducts->id)  }}" class="product-link" >
                                                <div class="limited-stock-product-image"><img src="{{asset('storage/'.$onerecommendedProducts->product_image_1) }}"></div>
                                                @empty($onerecommendedProducts->product_discount_price)
                                                    <div class="price-wrap ">
                                                        <p class="description">{{ $onerecommendedProducts->product_name }}</p>
                                                        <p class="price">&#x20A6; {{ number_format($onerecommendedProducts->product_price) }}</p>
                                                    
                                                        <p class="quantity">{{ $onerecommendedProducts->productInventory->stock_quantity }} </p>
                                                        <p class="rating"><i class="bi-star-fill star"></i><i class="bi-star-fill star"></i><i class="bi-star star"></i><i class="bi-star star"></i><i class="bi-star star"></i></p>
                                                    
                                                    </div>
                                                    
                                                @else
                                                    @php
                                                            
                                                        $discountedAmount = $onerecommendedProducts->product_price - $onerecommendedProducts->product_discount_price;
                                                        $percetageDecreaseForoneNaira = 100/$onerecommendedProducts->product_price;
                                                        $totalPercentageDecrease = $discountedAmount * $percetageDecreaseForoneNaira;
                                                    
                                                    @endphp
                                                    <div class="percentage sales-discount">
                                                
                                                        <p class="perc">-{{ ceil($totalPercentageDecrease) }}%</p>
                                                    </div>
                                                    <div class="price-wrap ">
                                                        <p class="description">{{ $onerecommendedProducts->product_name }}</p>
                                                        <p class="price">&#x20A6;{{ number_format($onerecommendedProducts->product_discount_price) }}  <span class="price-cancelled" style="font-weight:500">&#x20A6; {{ number_format($onerecommendedProducts->product_price) }}</span></p>
                                                        <p class="quantity">{{ $onerecommendedProducts->productInventory->stock_quantity }} </p>
                                                        <p class="rating"><i class="bi-star-fill star"></i><i class="bi-star-fill star"></i><i class="bi-star star"></i><i class="bi-star star"></i><i class="bi-star star"></i></p>
                                                    
                                                    </div>
                                                    
                                                @endempty
                                                
                    
                                                
                                            </a>
                                        </div>
                                    @endforeach
                                    
                                    <div class="flash-seemore flash-sales">
                                    
                                        <div class="seemore">
                                            <a style="color: black;" href="#">See More <i class="bi-arrow-right"></i></a>
                                        </div> 
                                        
                                        
            
                                        
                                    </div>
                                </div>
                                <div class="scroll-wrap left">
                                    <button class="scroll-btn" id="scrollbtnleft" onclick="grabbb('flash-sales', 'flash-sales', 'flash_sales_set', 'left', 'scrollbtnright', 'scrollbtnleft')"> <i class="bi-chevron-left scroll"></i></button>
                                </div>
                                <div class="scroll-wrap right">
                                    <button class="scroll-btn" id="scrollbtnright" onclick="grabbb('flash-sales', 'flash-sales', 'flash_sales_set', 'right', 'scrollbtnright', 'scrollbtnleft')">  <i class="bi-chevron-right scroll"></i>  </button>
                                </div>
                            </div>
                        </div>
                    </section>
                @endif

                {{-- @if($carts->count() > 20)  --}}

                
                {{-- select brands below --}}
                @empty($brands)

                @else            
                    <section class="black featured-brands-section">
                        <div class="row-l">
                                <div class="featured-brands-wrapper">
                                    <div class="featured-brands-header">
                                        <h1 style="">Featured Brands</h1>
                                    </div>
                                    <div class="featured-brands-set">
                                        
                                        @foreach($brands as $brand)
                                            <div class="brands">
                                                <a href="{{ route('store.shop.brands.show', $brand_id = $brand->id ) }}"><img style="height:100px" src="{{asset('storage/'.$brand->brand_image) }}"></a>
                                                

                                            </div>

                                        @endforeach
                                            
                                        
                                        
                                    </div>
                                </div>
                        </div>
                    </section>
                @endempty
                <!--Footer starts here-->
                @include('layouts.storeFooter')
                <!--Footer ends here-->
            </div>
        </div>
        
        @include('layouts.footer')
        
    </body>
</html>