<!DOCTYPE html> 
<html>
    <head>
        <title>Home | Vee Commerce </title>
        @include('layouts.storeHeadContent')
    </head>
    <body>
        <div class="wrapper">
            <div class="page-wrapper">
                @include('layouts.logout')
                @if($advert->count() > 0)
                    <section class="top-advert-section black" >
                        <div class="top-advert" >
                            <img style="width: 100%; height:100%" class="advert" src="{{asset('storage/'.$advert[0]->banner_image) }}">
                        </div>
                    </section>
                @endif
                <section class="" >
                    <div class="row-l ">
                        <nav class="navbar navbar-expand-xxl " >
                            <div class=" d-flex navigations">
                                <div class="menu dropdown">
                                    <button id="menu-open" class="menuopen " role="button" ><i class="bi-list-task"></i></button>
                                </div>
                
                                <div class="navbar-brand logo-wrap">
                                    <a href="{{ route('home') }}"> <img class="logoimg" src="{{asset('content/uploads/logo/logo.png') }}"></a>
                                    
                                </div>
                
                                <div class="header-search lg-none">
                                    <button class="lg-none"><i class="bi-search person-drop"></i></button>
                            
                                </div>
                                <div class="header-search sm-none">
                                    <form class="d-flex header-form" role="search" >
                                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                        <button class="btn searchbtn" style="background-color: rgb(255, 170, 0);" type="submit"><span class="sm-none md-none">Search </span> <span class="md-block sm-none"><i class="bi-search"></i></span></button>
                                    </form>
                                </div>
                                
                
                                <div class="user-dropdown dropdown orange" id="user-dropdown">
                                    <button class="user-drop-down-btn" id="user-dropdown-btn" role="button" ><i class="bi bi-person-circle person-drop"></i> <span class="md-none sm-none person-drop-acct" >Account</span></button>
                                        <ul class="user-dropdown-menu dropdown-menu" id="user-dropdown-menu">
                                        @auth
                                            <li class="d-flex dropdown-item"><a href="{{ route('auth.user.show') }}" class="navbar-dropdown-item dropdown-item"><i class="bi bi-person-circle"></i>&nbsp;&nbsp;{{ Auth::user()->firstname }} {{ Auth::user()->lastname }} </a>  <span role="button" class="bi-x" id="close-user-dropdown" style="color: red"></span></li>
                                            <li class="dropdown-item"><a href="{{ route('auth.user.showlogoutform') }}" class="navbar-dropdown-item dropdown-item"><i class="bi bi-person-circle"></i>&nbsp;&nbsp;logout</a></li>
                                        @else
                                            <li class="d-flex dropdown-item"><a href="{{ route('login') }}" class="navbar-dropdown-item dropdown-item"><i class="bi bi-lock"></i>&nbsp;&nbsp;Login</a>  <span class="bi-x" id="close-user-dropdown" style="color: red"></span></li>
                                            <li class="dropdown-item"><a href="{{ route('register') }}" class="navbar-dropdown-item dropdown-item"><i class="bi bi-pencil-square"></i>&nbsp;&nbsp;Register</a></li>
                                            
                                         @endauth
                                        </ul>
                                    
                                </div>
                                <div class="nav-cart orange">
                                    <button class="navcartbtn"><a href="{{ route('store.carts.show') }}" class="navcart"><i class="bi-cart"></i><sup class="" style="color: rgb(0, 0, 0);">{{ $itemsInCart->sum('quantity') }}</sup> <span class="sm-none md-none">Cart</span></a></button>
                                </div>
                                
                          
                            </div>
                        </nav>
                    </div>
                </section>
                <section class="black section-header-slider">
                    <div class="row-l slider-mother-row">
                        
                        <div class="row-l slider-row d-flex">
                            <div class="side-nav" id="menu_wrapper" >

                                <ul class="side-bar" >
                                    <div class="brand-menu grey-border"> 
                                        
                                        <div class="menu-logo"> <img src="{{asset('content/uploads/logo/logo.png') }}" alt="brand-logo"></div>
                                        <div class="menu-close"><button class="menu-close-btn" id="menu-close-button"> <i class="bi bi-x"></i></button></div>
                                    </div>

                                    <div class="menu-help grey-border">
                                        <a href="#" class="menu-link">Need Help &quest;</a> <i class="bi bi-chevron-right"></i>
                                    </div>

                                    <div class="menu-help ">
                                        <a href="#" class="menu-link" >My Account </a> <i class="bi bi-chevron-right"></i> 
                                    </div>
                                    <section class="grey-border pb-3">
                                        <li><a class="nav-list-item" href="{{ route('store.shop') }}"><i class="bi bi-cart3"></i> <span>Shop</span></a></li>
                                        <li><a class="nav-list-item" href="{{ route('store.shop.brands.display') }}"><i class="bi bi-shield-check"></i> <span>Shop By Brands</span></a></li>
                                        <li><a class="menu-link" href="{{ route('auth.user.orders') }}"><i class="bi bi-cart-check"></i> <span>My Orders</span></a></li>
                                        <li><a class="nav-list-item" href="{{ route('store.carts.show') }}"><i class="bi bi-cart3"></i> <span>Cart</span></a></li>
                                        <li><a class="nav-list-item" href="{{ route('store.coupon.show') }}"><i class="bi bi-percent"></i> <span>Coupons</span></a></li>
                                        <li><a class="nav-list-item" href="{{ route('auth.user.wishlist') }}"><i class="bi bi-heart"></i> <span>saved Items</span></a></li>
                                    </section>
                                    
                                    
                                    <div class="menu-help pt-3 ">
                                        <a href="#" class="menu-link" >Our Categories </a> <i class="bi bi-chevron-right"></i> 
                                    </div>

                                    <section class="grey-border pb-3 ">
                                        @empty($categories)
                                        

                                        @else
                                            @foreach($categories as $category)
                                            <li><a class="nav-list-item" href="{{ route('store.category.view', $category_id = $category->id )}}"><i class="bi bi-boxes"></i> <span>{{$category->category_name }}</span></a></li>
                                            @endforeach
                                        @endempty
                                   </section>

                                    <section class="pt-3 pb-3 menu-extras">
                                        <li><a class="nav-list-item" href="#"><i class="bi bi-truck"></i>Shipping and returns</a></li>
                                        <li><a class="nav-list-item" href="#"><i class="bi bi-telephone-forward"></i>Contact us</a></li>
                                        @auth
                                            <li><a class="nav-list-item" role="button" type="button"  data-bs-toggle="modal" data-bs-target="#staticBackdrop" ><i class="bi bi-box-arrow-right"></i> <span>Logout</span></a></li>
                                    
                                        @endauth
                                    </section>



                                </ul>
                                
                            </div>
                            
                            <div class="slider-wrap">
                                <div class="sliding-wrapper">
                                    
                                    <input class="slide-btn slidebtn1" type="radio" name="sliderclick" id="slide1"/>
                                    <input class="slide-btn slidebtn2" type="radio"  name="sliderclick" id="slide2"/>
                                    <input class="slide-btn slidebtn3"  type="radio" name="sliderclick" id="slide3"/>
                
                
                                    <div class="slider-wrapper" id="slider">
                                        @if($storebanners->count() > 0)


                                            <img class="slides slide-1" src="{{asset('storage/'.$storebanners[0]->banner_1) }}" id="slide-1" />
                                                
                                            {{-- banner 2 --}} 
                                            @empty($storebanners[0]->banner_2)

                                            @else
                                                <img class="slides slide-2" src="{{asset('storage/'.$storebanners[0]->banner_2) }}"  id="slide-2" />
                                            @endempty
                                             
                                            {{-- banner 3 --}}
                                            @empty($storebanners[0]->banner_3)

                                            @else
                                                <img class="slides slide-3" src="{{asset('storage/'.$storebanners[0]->banner_3) }}" id="slide-3" />
                                            @endempty
                                        @else
                                        
                                            <img class="slides slide-1" src="{{asset('content/uploads/backgrounds/banner3.avif') }}" id="slide-1" />

                                        @endif
                                        
                                    </div>
                                    <!--manual navigation start-->
                                    <div class="navigation-manual">
                                        <label for="slide1" class="manual-btn"></label>
                                        @empty($storebanners[0]->banner_2)
                                        @else
                                            <label for="slide2" class="manual-btn"></label>
                                        @endempty

                                        @empty($storebanners[0]->banner_3)
                                        @else
                                            <label for="slide3" class="manual-btn"></label>
                                        @endempty

                                        
                                        
                                        
                                    </div>
                                    <!--manual navigation end-->
                                    
                
                                    
                                </div>
                            </div>
                            <div class="side-advert">
                                <div class="advert-wrap">
                                    <img src="{{asset('content/uploads/adverts/giphy.gif') }}" class="d-block">
                                    <img src="{{asset('content/uploads/adverts/sales3.avif') }}" class="d-block">
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="black deals-section">
                    <div class="row-l" >
                        <div class="stock-deals-wrapper" >
                            <div class="stock-deals-header"> <h3 class="stock-deals-h">New Stock Collection</h3></div>
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

                @if($allcarts->count() > 20)
                <section class="black flash-sales-section">
                    <div class="row-l" id="viewableWidthofBestSeller">
                        <div class="flash-sales-wrapper">
                            <div class="flash-sales-header" style="background-color: #356bb3;"> <h3 class="flash-sales-h">Best Selling Products</h3></div>
                            <div class="flash-sales-set" id="best-sellers-set">
                                <div class="flash-sales best-sellers" id="best-sellers">
                                    <a href="#" class="product-link" >
                                        <div class="limited-stock-product-image"><img src="../../content/uploads/products/product_1_1.jpg"></div>
                                        <div class="percentage  sales-discount">
                                        
                                            <p class="perc">-1%</p>
                                        </div>
            
                                        <div class="price-wrap">
                                            <p class="description">1Afr fridge deep freezer withdfghcvbnazxcvb nzxvvbn n cv bzfg</p>
                                            <p class="price">&#x20A6; 23,000</p>
                                            <p class="price-cancelled">&#x20A6; 23,000</p>
                                            <p class="quantity">123 items left</p>
                                            <p class="rating"><i class="bi-star-fill star"></i><i class="bi-star-fill star"></i><i class="bi-star star"></i><i class="bi-star star"></i><i class="bi-star star"></i></p>
                                        
                                        </div>
                                    </a>
                                </div>
                                <div class="flash-sales best-sellers">
                                    <div class="limited-stock-product-image"><img src="../../content/uploads/products/product_1_1.jpg"></div>
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
                                <div class="flash-sales best-sellers">
                                    <div class="limited-stock-product-image"><img src="../../content/uploads/products/product_1_1.jpg"></div>
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
                                <div class="flash-sales best-sellers">
                                    <div class="limited-stock-product-image"><img src="../../content/uploads/products/product_1_1.jpg"></div>
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
                                <div class="flash-sales best-sellers">
                                    <div class="limited-stock-product-image"><img src="../../content/uploads/products/product_1_1.jpg"></div>
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

                                <div class="flash-sales best-sellers">
                                    <div class="limited-stock-product-image"><img src="../../content/uploads/products/product_1_1.jpg"></div>
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
                                <div class="flash-sales best-sellers">
                                    <div class="limited-stock-product-image"><img src="../../content/uploads/products/product_1_1.jpg"></div>
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
                                <div class="flash-sales best-sellers">
                                    <div class="limited-stock-product-image"><img src="../../content/uploads/products/product_1_1.jpg"></div>
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

                                <div class="flash-sales best-sellers">
                                    <div class="limited-stock-product-image"><img src="../../content/uploads/products/product_1_1.jpg"></div>
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
                                <div class="flash-sales best-sellers">
                                    <div class="limited-stock-product-image"><img src="../../content/uploads/products/product_1_1.jpg"></div>
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
                                <div class="flash-sales best-sellers">
                                    <div class="limited-stock-product-image"><img src="../../content/uploads/products/product_1_1.jpg"></div>
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
                                <div class="flash-sales best-sellers">
                                    <div class="limited-stock-product-image"><img src="../../content/uploads/products/product_1_1.jpg"></div>
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
                                <div class="flash-sales best-sellers">
                                    <div class="limited-stock-product-image"><img src="../../content/uploads/products/product_1_1.jpg"></div>
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
                                <div class="flash-seemore flash-sales best-sellers">
                                   
                                      <div class="seemore">
                                        <a style="color: black;" href="#">See More <i class="bi-arrow-right"></i></a>
                                      </div> 
                                      
                                    
        
                                    
                                </div>
                            </div>
                            <div class="scroll-wrap left">
                                <button class="scroll-btn" id="scrollbtnleftbestseller" onclick="grabbb('best-sellers', 'best-sellers', 'best-sellers-set', 'left', 'scrollbtnright', 'scrollbtnleft')"> <i class="bi-chevron-left scroll"></i></button>
                            </div>
                            <div class="scroll-wrap right">
                                <button class="scroll-btn" id="scrollbtnrightbestseller" onclick="grabbb('best-sellers', 'best-sellers', 'best-sellers-set', 'right', 'scrollbtnright', 'scrollbtnleft')">  <i class="bi-chevron-right scroll"></i>  </button>
                            </div>
                        </div>
                    </div>
                </section>
                @endif
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
                <section class="white">
                    <div class="row-l">
                        <div class="shipping-row-wrap">
                            <div class="shpping-row">
                                <div class="icon-center">
                                    <span class="bi-headset shpping-icon" ></span>
                                </div>
                                
                                <h2>Help</h2>
                                <p>Need help with anything? Get in <a href="#">touch</a></p>
                            </div>
                            <div class="shpping-row">
                                <div class="icon-center">
                                    <span class="bi-credit-card shpping-icon"></span>

                                </div>
                                <h2>Payments</h2>
                                <p>Issues with payments? Check out our <a href="#">payment options</a></p>
                            </div>
                            <div class="shpping-row">
                                <div class="icon-center">
                                    <span class="bi-truck shpping-icon"></span>

                                </div>
                                <h2>Shipping &amp; Returns</h2>
                                <p>Questions on shipping and returns?? Get in <a href="#">touch</a></p>
                            </div>
                            
                        </div>
                    </div>
                </section>
                <section class="blackish">
                    <div class="row-l">
                        
                        <div class="footer-wrapper">
                            <div class="about-wrapper">
                                <div class="about">
                                    
                                    <div class="footer-about-wrap">
                                        <h2>VeeCommerce – Online Shopping the easy way</h2>
                                        <p>
                                            VeeCommerce Nigeria is one of the best E-commerce developers for small and medium scale vendors, wholesalers and producers in Nigeria. 
                                            We offer a you a robust, visually appealing, highly scalable, high functioning and
                                             great user experince platform where you can showcase and even manage your products so customers in any part of Nigeria can find and shop 
                                            for all they need in one online store. 
                                            VeeCommerce websites, you can shop from the comfort of your home or during 
                                             work breaks and get everything delivered fast without you having to stress or move an inch.
                                              Be it fashion, electronics, mobile phones, computers,
                                             or your everyday groceries you can get everything you need on VeeCommerce developed online stores.
                                        </p>
                                    </div>
                                </div>
                                <div class="socials-wrapper">
                                    <ul>
                                        <li><a href="#"><i class="bi-facebook"></i></a></li>
                                        <li><a href="#"><i class="bi-twitter"></i></a></li>
                                        <li><a href="#"><i class="bi-instagram"></i></a></li>
                                        <li><a href="#"><i class="bi-linkedin"></i></a></li>
                                        
                                    </ul>
                                </div>
                            </div>
                            <div class="quicklinks-wrapper">
                                <div class="quicklinks-set">
                                    <div class="quicklinks">
                                        <h3>Useful links</h3>
                                        <ul>
                                            <li><a href="#">Home</a></li>
                                            <li><a href="#">About us</a></li>
                                            <li><a href="#">Returns &amp; Refund</a></li>
                                            <li><a href="#">Track Product</a></li>
                                            <li><a href="#">Shipping</a></li>
                                        </ul>
                                    </div>
                                    <div class="gethelp-wrapper">
                                        <h3>Need help?</h3>
                                        <ul>
                                            <li><a href="#">Chat with us</a></li>
                                            <li><a href="#">Contact us</a></li>
                                            <li><a href="#">Help Center</a></li>
                                            <li><a href="#">Terms &amp; conditions</a></li>
                                            <li><a href="#">Report a product</a></li>
                                        </ul>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="contact-wrapper sm-none">
                                <div class="contact">
                                    <h3>Get In touch</h3>
                                    <form class=" header-form" role="search" >
                                        <div class="mb-3">
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Send us a message"></textarea>
                                        </div>
                                        <div class="btnwrap"><button class="btn btn-primary"  type="submit">send</button></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="d-grey endofsite">
                    <div class="row-l centerl">
                        <div class="copyright-wrap">
                            <p>All rights reserved Vee Commerce 2023</p>
                        </div>
                    </div>
                </section>
                <!--Footer ends here-->
            </div>
        </div>
        
        
        <script type="text/javascript" src="{{asset('content/themes/js/menu.js') }}"></script>
        <script type="text/javascript" src="{{asset('content/themes/js/flashSalesSlider.js') }}"></script>
        <script type="text/javascript" src="{{asset('content/themes/js/slider.js') }}"></script>
    </body>
</html>