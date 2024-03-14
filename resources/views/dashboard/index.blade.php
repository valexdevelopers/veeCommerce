<!DOCTYPE html> 
<html>
    <head>
        <title>Dashboard | Vee Commerce </title>
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
                                <li class="d-links active"><a href="{{ route('auth.user.show') }}" class="active-link" > <i class="bi bi-house-door"></i> Dashboard</a></li>
                                <li class="d-links"><a href="{{ route('auth.user.orders') }}" ><i class="bi bi-bag"></i> My Orders</a></li>
                                
                                <li class="d-links"><a href="{{ route('auth.user.address') }}" ><i class="bi bi-house"></i>  Addresses</a></li> 
                                <li class="d-links"><a href="{{ route('auth.user.wishlist') }}" > <i class="bi bi-heart"></i> Wishlist</a></li>
                                
                                <li class="d-links"><a href="{{ route('auth.user.profile') }}" > <i class="bi bi-person"></i> Manage Profile</a></li>
                                <li class="d-links"><a href="{{ route('auth.user.showlogoutform') }}" > <i class="bi bi-box-arrow-right"></i> Logout</a></li>
                            </ul>
                        </div>
                        <div class="otherinfo">
                            <div class="dashboard-intro">
                                <h1>Dashboard</h1>
                                <p ></p>
                               
                            </div>
                            <p>Hello (Not {{ Auth::user()->firstname }} {{ Auth::user()->lastname }} ? <a href="{{ route('auth.user.showlogoutform') }}">log out</a>) </p>

                            <p>From your account dashboard you can view your recent <a href="#">orders</a>, manage your <a href="#">shipping and billing addresses</a>, and <a href="#">edit your password</a> edit your password and <a href="#">profile details.</a></p>
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