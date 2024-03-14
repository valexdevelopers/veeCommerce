<!DOCTYPE html> 
<html>
    <head>
        <title>Brands| Vee Commerce  </title>
        @include('layouts.storeHeadContent')
    
    
    </head>
    <body>
        <div class="wrapper">
            <div class="page-wrapper">
                @include('layouts.storeHeader')
                <section class="white deals-section">
                    <div class="row-l" >
                        <div class="stock-deals-wrapper" >
                            <div class="stock-deals-header"> <h3 class="stock-deals-h">Featured Brand</h3></div>
                            @if($brands->count() <= 0)
                                <div  style="display: grid; place-items:center; background:white">
                                    <div class="cart-body-wrap">
                                        <div class="not-added-wrap">
                                            <div class="not-added-yet">
                                                <div class="notadded-icon"> <i class="bi bi-cart4"></i></div>
                                                <h3>No available Brands</h3>
                                                <p>No branded items for sale, kindly check back on restock </p>


                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                            @else
                                <div class="category-set">
                                    @foreach($brands as $brand)
                                        <div class="categories">
                                            <a href="{{ route('store.shop.brands.show', $brand_id = $brand->id) }}" class="product-link" >
                                                <div class="category-image"><img src="{{asset('storage/'.$brand->brand_image) }}"></div>
                                                <p class="category-details">{{ $brand->brand_name }}</p>
                                            </a>
                                        </div>
                                    @endforeach
                                 
                                </div>
                            @endif
                        </div>
                    </div>
                </section>
                <section class="black deals-section">
                    <div class="row-l" >
                        <div class="stock-deals-wrapper" >
                            <div class="stock-deals-header"> <h3 class="stock-deals-h">Zikel Cosmetics</h3></div>
                            <div class="stock-deals-set">
                                <div class="stock-deals">
                                    <a href="#" class="product-link" >
                                        <div class="limited-stock-category-image"><img src="{{asset('content/uploads/brands/zikel/zikel1.jpg') }}"></div>
                                    
                                        <div class="percentage sales-discount">
                                        
                                            <p class="perc">-12%</p>
                                        </div>
                                    
                                        <div class="limited-stock-price-wrap">
                                            <p class="description">Afr fridge deep freezer withdfghcvbnazxcvb nzxvvbn n cv bzfg</p>
                                            <p class="price">&#x20A6; 23,000</p>
                                            <p class="price-cancelled">&#x20A6; 23,000</p>
                                            
                                        </div>
                                    </a>
                                </div>
                                <div class="stock-deals stock-deals-category">
                                    <a href="#" class="product-link" >
                                        <div class="limited-stock-category-image"><img src="{{asset('content/uploads/brands/zikel/zikel2.jpg') }}"></div>
                                    
                                        <div class="percentage sales-discount">
                                        
                                            <p class="perc">-12%</p>
                                        </div>
                                    
                                        <div class="limited-stock-price-wrap">
                                            <p class="description">Afr fridge deep freezer withdfghcvbnazxcvb nzxvvbn n cv bzfg</p>
                                            <p class="price">&#x20A6; 23,000</p>
                                            <p class="price-cancelled">&#x20A6; 23,000</p>
                                            
                                        </div>
                                    </a>
                                </div>
                                <div class="stock-deals stock-deals-category">
                                    <a href="#" class="product-link" >
                                        <div class="limited-stock-category-image"><img src="{{asset('content/uploads/brands/zikel/zikel3.jpg') }}"></div>
                                    
                                        <div class="percentage sales-discount">
                                        
                                            <p class="perc">-12%</p>
                                        </div>
                                    
                                        <div class="limited-stock-price-wrap">
                                            <p class="description">Afr fridge deep freezer withdfghcvbnazxcvb nzxvvbn n cv bzfg</p>
                                            <p class="price">&#x20A6; 23,000</p>
                                            <p class="price-cancelled">&#x20A6; 23,000</p>
                                            
                                        </div>
                                    </a>
                                </div>
                                <div class="stock-deals stock-deals-category">
                                    <a href="#" class="product-link" >
                                        <div class="limited-stock-category-image"><img src="{{asset('content/uploads/brands/zikel/zikel4.jpg') }}"></div>
                                    
                                        <div class="percentage sales-discount">
                                        
                                            <p class="perc">-12%</p>
                                        </div>
                                    
                                        <div class="limited-stock-price-wrap">
                                            <p class="description">Afr fridge deep freezer withdfghcvbnazxcvb nzxvvbn n cv bzfg</p>
                                            <p class="price">&#x20A6; 23,000</p>
                                            <p class="price-cancelled">&#x20A6; 23,000</p>
                                            
                                        </div>
                                    </a>
                                </div>
                                <div class="stock-deals stock-deals-category">
                                    <a href="#" class="product-link" >
                                        <div class="limited-stock-category-image"><img src="{{asset('content/uploads/brands/zikel/zikel5.jpg') }}"></div>
                                    
                                        <div class="percentage sales-discount">
                                        
                                            <p class="perc">-12%</p>
                                        </div>
                                    
                                        <div class="limited-stock-price-wrap">
                                            <p class="description">Afr fridge deep freezer withdfghcvbnazxcvb nzxvvbn n cv bzfg</p>
                                            <p class="price">&#x20A6; 23,000</p>
                                            <p class="price-cancelled">&#x20A6; 23,000</p>
                                            
                                        </div>
                                    </a>
                                </div>
                                <div class="stock-deals stock-deals-category">
                                    <a href="#" class="product-link" >
                                        <div class="limited-stock-category-image"><img src="{{asset('content/uploads/brands/zikel/Zikel6.png') }}"></div>
                                    
                                        <div class="percentage sales-discount">
                                        
                                            <p class="perc">-12%</p>
                                        </div>
                                    
                                        <div class="limited-stock-price-wrap">
                                            <p class="description">Afr fridge deep freezer withdfghcvbnazxcvb nzxvvbn n cv bzfg</p>
                                            <p class="price">&#x20A6; 23,000</p>
                                            <p class="price-cancelled">&#x20A6; 23,000</p>
                                            
                                        </div>
                                    </a>
                                </div>
                                <div class="stock-deals stock-deals-category">
                                    <a href="#" class="product-link" >
                                        <div class="limited-stock-category-image"><img src="{{asset('content/uploads/brands/zikel/Zikel11.jpg') }}"></div>
                                    
                                        <div class="percentage sales-discount">
                                        
                                            <p class="perc">-12%</p>
                                        </div>
                                    
                                        <div class="limited-stock-price-wrap">
                                            <p class="description">Afr fridge deep freezer withdfghcvbnazxcvb nzxvvbn n cv bzfg</p>
                                            <p class="price">&#x20A6; 23,000</p>
                                            <p class="price-cancelled">&#x20A6; 23,000</p>
                                            
                                        </div>
                                    </a>
                                </div>
                                <div class="stock-deals stock-deals-category">
                                    <a href="#" class="product-link" >
                                        <div class="limited-stock-category-image"><img src="{{asset('content/uploads/brands/zikel/zikel8.jpg') }}"></div>
                                    
                                        <div class="percentage sales-discount">
                                        
                                            <p class="perc">-12%</p>
                                        </div>
                                    
                                        <div class="limited-stock-price-wrap">
                                            <p class="description">Afr fridge deep freezer withdfghcvbnazxcvb nzxvvbn n cv bzfg</p>
                                            <p class="price">&#x20A6; 23,000</p>
                                            <p class="price-cancelled">&#x20A6; 23,000</p>
                                            
                                        </div>
                                    </a>
                                </div>
                                <div class="stock-deals stock-deals-category">
                                    <a href="#" class="product-link" >
                                        <div class="limited-stock-category-image"><img src="{{asset('content/uploads/brands/zikel/zikel9.jpg') }}"></div>
                                    
                                        <div class="percentage sales-discount">
                                        
                                            <p class="perc">-12%</p>
                                        </div>
                                    
                                        <div class="limited-stock-price-wrap">
                                            <p class="description">Afr fridge deep freezer withdfghcvbnazxcvb nzxvvbn n cv bzfg</p>
                                            <p class="price">&#x20A6; 23,000</p>
                                            <p class="price-cancelled">&#x20A6; 23,000</p>
                                            
                                        </div>
                                    </a>
                                </div>
                                <div class="stock-deals stock-deals-category">
                                    <a href="#" class="product-link" >
                                        <div class="limited-stock-category-image"><img src="{{asset('content/uploads/brands/zikel/zikel10.jpg') }}"></div>
                                    
                                        <div class="percentage sales-discount">
                                        
                                            <p class="perc">-12%</p>
                                        </div>
                                    
                                        <div class="limited-stock-price-wrap">
                                            <p class="description">Afr fridge deep freezer withdfghcvbnazxcvb nzxvvbn n cv bzfg</p>
                                            <p class="price">&#x20A6; 23,000</p>
                                            <p class="price-cancelled">&#x20A6; 23,000</p>
                                            
                                        </div>
                                    </a>
                                </div>
                                
                                
                                
                            </div>
                            
                        </div>
                    </div>
                </section>

                <section class="black flash-sales-section">
                    <div class="row-l" id="viewableWidth">
                        <div class="flash-sales-wrapper">
                            <div class="flash-sales-header"> <h3 class="flash-sales-h">House of Tara</h3></div>
                            <div class="flash-sales-set" id="flash_sales_set">
                                <div class="flash-sales flash-sales-category" id="flash-sales">
                                    <a href="#" class="product-link" >
                                        <div class="limited-stock-product-image"><img src="{{asset('content/uploads/brands/tara/tara1.jpg') }}"></div>
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
                                    <div class="limited-stock-product-image"><img src="{{asset('content/uploads/brands/tara/tara2.jpg') }}"></div>
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
                                    <div class="limited-stock-product-image"><img src="{{asset('content/uploads/brands/zikel/Zikel3.jpg') }}"></div>
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
                                    <div class="limited-stock-product-image"><img src="{{asset('content/uploads/brands/zikel/zikel4.jpg') }}"></div>
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
                                    <div class="limited-stock-product-image"><img src="{{asset('content/uploads/brands/zikel/zikel5.jpg') }}"></div>
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
                                    <div class="limited-stock-product-image"><img src="{{asset('content/uploads/brands/zikel/Zikel6.png') }}"></div>
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
                                    <div class="limited-stock-product-image"><img src="{{asset('content/uploads/brands/zikel/Zikel8.jpg') }}"></div>
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
                                    <div class="limited-stock-product-image"><img src="{{asset('content/uploads/brands/tara/tara3.jpg') }}"></div>
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
                                    <div class="limited-stock-product-image"><img src="{{asset('content/uploads/brands/tara/tara4.jpg') }}"></div>
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
                                    <div class="limited-stock-product-image"><img src="{{asset('content/uploads/brands/tara/tara5.jpg') }}"></div>
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
                                    <div class="limited-stock-product-image"><img src="{{asset('content/uploads/brands/tara/tara6.jpg') }}"></div>
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
                                    <div class="limited-stock-product-image"><img src="{{asset('content/uploads/brands/tara/tara7.jpeg') }}"></div>
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
                                    <div class="limited-stock-product-image"><img src="{{asset('content/uploads/brands/tara/tara8.jpg') }}"></div>
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
                                        <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                        </li>
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