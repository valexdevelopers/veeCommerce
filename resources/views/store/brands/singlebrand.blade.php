<!DOCTYPE html> 
<html>
    <head>
        <title>{{ $brand->brand_name }} | Vee Commerce  </title>
        @include('layouts.storeHeadContent')
    
    
    </head>
    <body>
        <div class="wrapper">
            <div class="page-wrapper">
                @include('layouts.storeHeader')
                <section class="black deals-section">
                    <div class="row-l" >
                        <div class="stock-deals-wrapper" >
                            <div class="stock-deals-header"> <h3 class="stock-deals-h" style="text-transform: capitalize">{{ $brand->brand_name }}</h3></div>
                            @if($brand->brandsProduct->count() <= 0)
                                <div  style="display: grid; place-items:center; background:white">
                                    <div class="cart-body-wrap">
                                        <div class="not-added-wrap">
                                            <div class="not-added-yet">
                                                <div class="notadded-icon"> <i class="bi bi-cart4"></i></div>
                                                <h3>This Brand has no products in stock</h3>
                                                <p>Products in this brand are currently out of stock, kindly check back on restock </p>


                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                   
                            @else
                                <div class="stock-deals-set">
                                    @foreach($productsForBrand as $productInBrand)

                                        <div class="stock-deals stock-deals-category">
                                            <a href="{{ route('store.products.view', $product_id = $productInBrand->id)  }}" class="product-link" >
                                                <div class="limited-stock-product-image"><img src="{{asset('storage/'.$productInBrand->product_image_1) }}"></div>
                                    
                                                @empty($productInBrand->product_discount_price)
                                                    <div class="limited-stock-price-wrap">
                                                        <p class="description">{{ $productInBrand->product_name }}</p>
                                                        <p class="price">&#x20A6; {{ $productInBrand->product_price }}</p>
                                                        <a href="{{ route('store.products.view', $product_id = $productInBrand->id ) }}" class="add-to-cart-home">Add to Cart</a>
                                                        
                                                    </div>
                                                @else
                                                    @php
                                                            
                                                        $discountedAmount = $productInBrand->product_price - $productInBrand->product_discount_price;
                                                        $percetageDecreaseForoneNaira = 100/$productInBrand->product_price;
                                                        $totalPercentageDecrease = $discountedAmount * $percetageDecreaseForoneNaira;
                                                    
                                                    @endphp
                                                    <div class="percentage sales-discount">
                                                
                                                        <p class="perc">-{{ ceil($totalPercentageDecrease) }}%</p>
                                                    </div>
                                                    <div class="limited-stock-price-wrap">
                                                        <p class="description">{{ $productInBrand->product_name }}</p>
                                                        <p class="price">&#x20A6; {{ $productInBrand->product_discount_price }} <span class="price-cancelled" style="font-weight:500">&#x20A6; {{ number_format($productInBrand->product_price) }}</span></p>
                                                        <a href="{{ route('store.products.view', $product_id = $productInBrand->id ) }}" class="add-to-cart-home">Add to Cart</a>
                                                        
                                                    </div>
                                                @endempty
                                            </a>
                                        </div>
                                        
                                    @endforeach
                                </div> 
                            @endif
                                
                           
                            
                        </div>
                    </div>
                </section>
                <section class="white deals-section">
                    <div class="row-l" >
                        <div class="stock-deals-wrapper" >
                            <div class="stock-deals-header"> <h3 class="stock-deals-h">Some Featured Brand</h3></div>

                            <div class="category-set">
                                @foreach($brands as $singleBrand)
                                    <div class="categories">
                                        <a href="{{ route('store.shop.brands.show', $brand_id = $singleBrand->id ) }}" class="product-link" >
                                            <div class="category-image"><img src="{{asset('storage/'.$singleBrand->brand_image) }}"></div>
                                            <p class="category-details">{{ $singleBrand->brand_name }}</p>
                                        </a>
                                    </div>
                                @endforeach
                             
                            </div>
                            
                        </div>
                    </div>
                </section>
                

                <section class="black flash-sales-section">
                    <div class="row-l" id="viewableWidth">
                        <div class="flash-sales-wrapper">
                            <div class="flash-sales-header"> <h3 class="flash-sales-h">Recommended Products</h3></div>
                            <div class="flash-sales-set" id="flash_sales_set">
                                <div class="flash-sales flash-sales-category" id="flash-sales">
                                    <a href="#" class="product-link" >
                                        <div class="limited-stock-product-image"><img src="{{asset('content/uploads/products/product_1_1.jpg') }}"></div>
                                        <div class="percentage  sales-discount">
                                        
                                            <p class="perc">-1%</p>
                                        </div>
            
                                        <div class="price-wrap ">
                                            <p class="description">1Afr fridge deep freezer withdfghcvbnazxcvb nzxvvbn n cv bzfg</p>
                                            <p class="price">&#x20A6; 23,000</p>
                                            <p class="price-cancelled">&#x20A6; 23,000</p>
                                            <p class="quantity">123 items left</p>
                                            <p class="rating"><i class="bi-star-fill star"></i><i class="bi-star-fill star"></i><i class="bi-star star"></i><i class="bi-star star"></i><i class="bi-star star"></i></p>
                                        
                                        </div>
                                    </a>
                                </div>
                                <div class="flash-sales flash-sales-category">
                                    <div class="limited-stock-product-image"><img src="{{asset('content/uploads/products/product_1_1.jpg') }}"></div>
                                    <div class="percentage  sales-discount">
                                       
                                        <p class="perc">-1%</p>
                                    </div>
        
                                    <div class="price-wrap ">
                                        <p class="description">2Afr fridge deep freezer withdfghcvbnazxcvb nzxvvbn n cv bzfg</p>
                                        <p class="price">&#x20A6; 23,000</p>
                                        <p class="price-cancelled">&#x20A6; 23,000</p>
                                        <p class="quantity">123 items left</p>
                                        <p class="rating"><i class="bi-star-fill star"></i><i class="bi-star-fill star"></i><i class="bi-star star"></i><i class="bi-star star"></i><i class="bi-star star"></i></p>
                                       
                                    </div>
                                </div>
                                <div class="flash-sales flash-sales-category">
                                    <div class="limited-stock-product-image"><img src="{{asset('content/uploads/products/product_1_1.jpg') }}"></div>
                                    <div class="percentage  sales-discount">
                                       
                                        <p class="perc">-1%</p>
                                    </div>
        
                                    <div class="price-wrap ">
                                        <p class="description">Afr fridge deep freezer withdfghcvbnazxcvb nzxvvbn n cv bzfg</p>
                                        <p class="price">&#x20A6; 23,000</p>
                                        <p class="price-cancelled">&#x20A6; 23,000</p>
                                        <p class="quantity">123 items left</p>
                                        <p class="rating"><i class="bi-star-fill star"></i><i class="bi-star-fill star"></i><i class="bi-star star"></i><i class="bi-star star"></i><i class="bi-star star"></i></p>
                                       
                                    </div>
                                </div>
                                <div class="flash-sales flash-sales-category">
                                    <div class="limited-stock-product-image"><img src="{{asset('content/uploads/products/product_1_1.jpg') }}"></div>
                                    <div class="percentage  sales-discount">
                                       
                                        <p class="perc">-1%</p>
                                    </div>
        
                                    <div class="price-wrap ">
                                        <p class="description">Afr fridge deep freezer withdfghcvbnazxcvb nzxvvbn n cv bzfg</p>
                                        <p class="price">&#x20A6; 23,000</p>
                                        <p class="price-cancelled">&#x20A6; 23,000</p>
                                        <p class="quantity">123 items left</p>
                                        <p class="rating"><i class="bi-star-fill star"></i><i class="bi-star-fill star"></i><i class="bi-star star"></i><i class="bi-star star"></i><i class="bi-star star"></i></p>
                                       
                                    </div>
                                </div>
                                <div class="flash-sales flash-sales-category">
                                    <div class="limited-stock-product-image"><img src="{{asset('content/uploads/products/product_1_1.jpg') }}"></div>
                                    <div class="percentage  sales-discount">
                                       
                                        <p class="perc">-1%</p>
                                    </div>
        
                                    <div class="price-wrap ">
                                        <p class="description">Afr fridge deep freezer withdfghcvbnazxcvb nzxvvbn n cv bzfg</p>
                                        <p class="price">&#x20A6; 23,000</p>
                                        <p class="price-cancelled">&#x20A6; 23,000</p>
                                        <p class="quantity">123 items left</p>
                                        <p class="rating"><i class="bi-star-fill star"></i><i class="bi-star-fill star"></i><i class="bi-star star"></i><i class="bi-star star"></i><i class="bi-star star"></i></p>
                                       
                                    </div>
                                </div>

                                <div class="flash-sales flash-sales-category">
                                    <div class="limited-stock-product-image"><img src="{{asset('content/uploads/products/product_1_1.jpg') }}"></div>
                                    <div class="percentage  sales-discount">
                                       
                                        <p class="perc">-1%</p>
                                    </div>
        
                                    <div class="price-wrap ">
                                        <p class="description">Afr fridge deep freezer withdfghcvbnazxcvb nzxvvbn n cv bzfg</p>
                                        <p class="price">&#x20A6; 23,000</p>
                                        <p class="price-cancelled">&#x20A6; 23,000</p>
                                        <p class="quantity">123 items left</p>
                                        <p class="rating"><i class="bi-star-fill star"></i><i class="bi-star-fill star"></i><i class="bi-star star"></i><i class="bi-star star"></i><i class="bi-star star"></i></p>
                                       
                                    </div>
                                </div>
                                <div class="flash-sales flash-sales-category">
                                    <div class="limited-stock-product-image"><img src="{{asset('content/uploads/products/product_1_1.jpg') }}"></div>
                                    <div class="percentage  sales-discount">
                                       
                                        <p class="perc">-1%</p>
                                    </div>
        
                                    <div class="price-wrap ">
                                        <p class="description">Afr fridge deep freezer withdfghcvbnazxcvb nzxvvbn n cv bzfg</p>
                                        <p class="price">&#x20A6; 23,000</p>
                                        <p class="price-cancelled">&#x20A6; 23,000</p>
                                        <p class="quantity">123 items left</p>
                                        <p class="rating"><i class="bi-star-fill star"></i><i class="bi-star-fill star"></i><i class="bi-star star"></i><i class="bi-star star"></i><i class="bi-star star"></i></p>
                                       
                                    </div>
                                </div>
                                <div class="flash-sales flash-sales-category">
                                    <div class="limited-stock-product-image"><img src="{{asset('content/uploads/products/product_1_1.jpg') }}"></div>
                                    <div class="percentage  sales-discount">
                                       
                                        <p class="perc">-1%</p>
                                    </div>
        
                                    <div class="price-wrap ">
                                        <p class="description">Afr fridge deep freezer withdfghcvbnazxcvb nzxvvbn n cv bzfg</p>
                                        <p class="price">&#x20A6; 23,000</p>
                                        <p class="price-cancelled">&#x20A6; 23,000</p>
                                        <p class="quantity">123 items left</p>
                                        <p class="rating"><i class="bi-star-fill star"></i><i class="bi-star-fill star"></i><i class="bi-star star"></i><i class="bi-star star"></i><i class="bi-star star"></i></p>
                                       
                                    </div>
                                </div>

                                <div class="flash-sales flash-sales-category">
                                    <div class="limited-stock-product-image"><img src="{{asset('content/uploads/products/product_1_1.jpg') }}"></div>
                                    <div class="percentage  sales-discount">
                                       
                                        <p class="perc">-1%</p>
                                    </div>
        
                                    <div class="price-wrap ">
                                        <p class="description">Afr fridge deep freezer withdfghcvbnazxcvb nzxvvbn n cv bzfg</p>
                                        <p class="price">&#x20A6; 23,000</p>
                                        <p class="price-cancelled">&#x20A6; 23,000</p>
                                        <p class="quantity">123 items left</p>
                                        <p class="rating"><i class="bi-star-fill star"></i><i class="bi-star-fill star"></i><i class="bi-star star"></i><i class="bi-star star"></i><i class="bi-star star"></i></p>
                                       
                                    </div>
                                </div>
                                <div class="flash-sales flash-sales-category">
                                    <div class="limited-stock-product-image"><img src="{{asset('content/uploads/products/product_1_1.jpg') }}"></div>
                                    <div class="percentage  sales-discount">
                                       
                                        <p class="perc">-1%</p>
                                    </div>
        
                                    <div class="price-wrap ">
                                        <p class="description">Afr fridge deep freezer withdfghcvbnazxcvb nzxvvbn n cv bzfg</p>
                                        <p class="price">&#x20A6; 23,000</p>
                                        <p class="price-cancelled">&#x20A6; 23,000</p>
                                        <p class="quantity">123 items left</p>
                                        <p class="rating"><i class="bi-star-fill star"></i><i class="bi-star-fill star"></i><i class="bi-star star"></i><i class="bi-star star"></i><i class="bi-star star"></i></p>
                                       
                                    </div>
                                </div>
                                <div class="flash-sales flash-sales-category">
                                    <div class="limited-stock-product-image"><img src="{{asset('content/uploads/products/product_1_1.jpg') }}"></div>
                                    <div class="percentage  sales-discount">
                                       
                                        <p class="perc">-1%</p>
                                    </div>
        
                                    <div class="price-wrap ">
                                        <p class="description">Afr fridge deep freezer withdfghcvbnazxcvb nzxvvbn n cv bzfg</p>
                                        <p class="price">&#x20A6; 23,000</p>
                                        <p class="price-cancelled">&#x20A6; 23,000</p>
                                        <p class="quantity">123 items left</p>
                                        <p class="rating"><i class="bi-star-fill star"></i><i class="bi-star-fill star"></i><i class="bi-star star"></i><i class="bi-star star"></i><i class="bi-star star"></i></p>
                                       
                                    </div>
                                </div>
                                <div class="flash-sales flash-sales-category">
                                    <div class="limited-stock-product-image"><img src="{{asset('content/uploads/products/product_1_1.jpg') }}"></div>
                                    <div class="percentage  sales-discount">
                                       
                                        <p class="perc">-1%</p>
                                    </div>
        
                                    <div class="price-wrap ">
                                        <p class="description">Afr fridge deep freezer withdfghcvbnazxcvb nzxvvbn n cv bzfg</p>
                                        <p class="price">&#x20A6; 23,000</p>
                                        <p class="price-cancelled">&#x20A6; 23,000</p>
                                        <p class="quantity">123 items left</p>
                                        <p class="rating"><i class="bi-star-fill star"></i><i class="bi-star-fill star"></i><i class="bi-star star"></i><i class="bi-star star"></i><i class="bi-star star"></i></p>
                                       
                                    </div>
                                </div>
                                <div class="flash-sales flash-sales-category">
                                    <div class="limited-stock-product-image"><img src="{{asset('content/uploads/products/product_1_1.jpg') }}"></div>
                                    <div class="percentage  sales-discount">
                                       
                                        <p class="perc">-1%</p>
                                    </div>
        
                                    <div class="price-wrap ">
                                        <p class="description">Afr fridge deep freezer withdfghcvbnazxcvb nzxvvbn n cv bzfg</p>
                                        <p class="price">&#x20A6; 23,000</p>
                                        <p class="price-cancelled">&#x20A6; 23,000</p>
                                        <p class="quantity">123 items left</p>
                                        <p class="rating"><i class="bi-star-fill star"></i><i class="bi-star-fill star"></i><i class="bi-star star"></i><i class="bi-star star"></i><i class="bi-star star"></i></p>
                                       
                                    </div>
                                </div>
                                <div class="flash-seemore flash-sales">
                                   
                                      <div class="seemore">
                                        <a style="color: black;" href="#">See More <i class="bi-arrow-right"></i></a>
                                      </div> 
                                      
                                    
        
                                    
                                </div>
                            </div>
                            <div class="scroll-wrap left">
                                <button class="scroll-btn" id="scrollbtnleft"> <i class="bi-chevron-left scroll"></i></button>
                            </div>
                            <div class="scroll-wrap right">
                                <button class="scroll-btn" id="scrollbtnright">  <i class="bi-chevron-right scroll"></i>  </button>
                            </div>
                        </div>
                    </div>
                </section>
                
              
                <section class="black pagination-section">
                    <div class="row-l">
                        <div class="row-l pagination-row">
                            <div class="grey-text page-number">
                                
                            </div>
                            <div>
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-end">
                                        {{$productsForBrand->links()}}
                                    </ul>
                                    </nav>
                            </div>
                        </div>
                    </div>
                </section>


                <!--Footer starts here-->
                @include('layouts.storeFooter')
                <!--Footer ends here-->
            </div>
        </div>
    
       @include('layouts.footer')
    </body>
</html>