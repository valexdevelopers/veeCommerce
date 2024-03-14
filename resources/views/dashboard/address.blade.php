<!DOCTYPE html> 
<html>
    <head>
        <title>Shipping Address | Vee Commerce </title>
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
                                <ul>
                                    <li class="d-links "><a href="{{ route('auth.user.show') }}"  > <i class="bi bi-house-door"></i> Dashboard</a></li>
                                    <li class="d-links"><a href="{{ route('auth.user.orders') }}" ><i class="bi bi-bag"></i> My Orders</a></li>
                                    
                                    <li class="d-links active"><a href="{{ route('auth.user.address') }}" class="active-link" ><i class="bi bi-house"></i>  Addresses</a></li> 
                                    <li class="d-links"><a href="{{ route('auth.user.wishlist') }}" > <i class="bi bi-heart"></i> Wishlist</a></li>
                                    
                                    <li class="d-links"><a href="{{ route('auth.user.profile') }}" > <i class="bi bi-person"></i> Manage Profile</a></li>
                                    <li class="d-links"><a href="{{ route('auth.user.showlogoutform') }}" > <i class="bi bi-box-arrow-right"></i> Logout</a></li>
                                </ul>
                            </ul>
                        </div>
                        <div class="otherinfo">
                            <div class="dashboard-intro">
                                <h1>Addresses</h1>
                                <p ></p>
                               
                            </div>
                            @if(Session::has('message'))
                                    <div class="alert {{ Session::get('message-color') }} alert-dismissible fade show" role="alert">
                                        <strong>{{ Session::get('message') }}</strong> 
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                            @endif
                            <p>The following addresses will be used on the checkout page by default.</p>
                            <div class="addresses-wrap">
                                @empty($address)
                                    <div class="billing-address address">
                                        <header>
                                            <p> address</p>
                                            <a role="button" class="">Add</a>
                                            <!--<a role="button" class="btn btn-secondary">Add</a> -->
                                        </header>
                                        <address>
                                            <ul>
                                                <li>You have not set this type of address yet</li>
                                                
                                            </ul>
                                            
                                        </address>
                                        
                                    </div>
                                @else
                                    <div class="billing-address address">
                                        <header>
                                            <p> address</p>
                                            <a href="{{ route('auth.user.address.showform') }}" class="">Edit</a>
                                            <!--<a role="button" class="btn btn-secondary">Add</a> -->
                                        </header>
                                        <address>
                                            <ul>
                                                <li>{{ $address->firstname }} {{ $address->lastname }}</li>
                                                <li>{{ $address->street }}</li>
                                                <li>{{ $address->town }}</li>
                                                <li>{{ $address->region }}</li>
                                                <li>{{ $address->country }}</li>
                                                <li> {{ $address->postal_code }}</li>
                                            </ul>
                                        </address>
                                    </div>
                                @endempty
                                
                            </div>
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