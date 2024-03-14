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
<section class="mobile-dropdown">
    <div >
        <div>
            <div class="side-nav" id="menu_wrapper" >

                <ul class="side-bar" >
                    <div class="brand-menu grey-border"> 
                        
                        <div class="menu-logo"> <img src="{{asset('content/uploads/logo/logo.png') }}" alt="brand-logo"></div>
                        <div class="menu-close"><button class="menu-close-btn" id="menu-close-button"> <i class="bi bi-backspace"></i></button></div>
                    </div>

                    <div class="menu-help grey-border">
                        <a href="#" class="menu-link">Need Help &quest;</a> <i class="bi bi-chevron-right"></i>
                    </div>
                    <section class="grey-border pb-3">
                        <li><a class="nav-list-item" href="{{ route('store.shop') }}"><i class="bi bi-cart3"></i> <span>Shop</span></a></li>
                        <li><a class="nav-list-item" href="{{ route('store.shop.brands.display') }}"><i class="bi bi-shield-check"></i> <span>Shop By Brands</span></a></li>
                        
                    </section >
                    <div class="menu-help ">
                        <a href="#" class="menu-link" >My Account </a> <i class="bi bi-chevron-right"></i> 
                    </div>
                    @auth
                        <section class="grey-border pb-3">
                            <section class="auth">
                                <li><a class="nav-list-item" href="{{ route('auth.user.show') }}"><i class="bi bi-house-door"></i> <span>Dashboard</span></a></li>
                                <li><a class="nav-list-item" href="{{ route('auth.user.orders') }}"><i class="bi bi-bag"></i> <span>My Orders</span></a></li>
                                <li><a class="nav-list-item" href="{{ route('auth.user.address') }}"><i class="bi bi-house"></i> <span>Addresses</span></a></li>
                                <li><a class="nav-list-item" href="{{ route('auth.user.wishlist') }}"><i class="bi bi-heart"></i> <span> Wishlist</span></a></li>
                                <li><a class="nav-list-item" href="{{ route('auth.user.profile') }}"><i class="bi bi-person"></i> <span>Manage Profile</span></a></li>
                                
                                
                            </section>
                            
                            <li><a class="nav-list-item" href="{{ route('store.carts.show') }}"><i class="bi bi-cart4"></i> <span>Cart</span></a></li>
                            <li><a class="nav-list-item" href="{{ route('store.coupon.show') }}"><i class="bi bi-percent"></i> <span>Coupons</span></a></li>
                            
                        </section >
                    @else
                        <section class="grey-border pb-3">
                            <section class="auth">
                                <li><a class="nav-list-item" href="{{ route('login') }}"><i class="bi bi-lock"></i> <span>Login</span></a></li>
                                <li><a class="nav-list-item" href="{{ route('register') }}"><i class="bi bi-pencil-square"></i> <span>Register</span></a></li>
                                
                            </section>
                            
                            <li><a class="nav-list-item" href="{{ route('store.carts.show') }}"><i class="bi bi-cart4"></i> <span>Cart</span></a></li>
                            <li><a class="nav-list-item" href="{{ route('store.coupon.show') }}"><i class="bi bi-percent"></i> <span>Coupons</span></a></li>
                            
                        </section >
                    @endauth
                    
                    
                    <div class="menu-help pt-3 ">
                        <a href="#" class="menu-link" >Our Categories </a> <i class="bi bi-chevron-right"></i> 
                    </div>

                    <section class="grey-border pb-3 ">
                        @empty($categories)
                                        

                        @else
                            @foreach($categories as $category)
                            <li><a class="nav-list-item" href="{{ route('store.category.view', $category_id = $category->id )}}"><i class="bi bi-magic"></i> <span>{{$category->category_name }}</span></a></li>
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
            
            
        </div>
    </div>
</section>