<!DOCTYPE html> 
<html>
    <head>
        <title>Logout | Vee Commerce </title>
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
                                <li class="d-links "><a href="{{ route('auth.user.show') }}"  > <i class="bi bi-house-door"></i> Dashboard</a></li>
                                <li class="d-links"><a href="{{ route('auth.user.orders') }}" ><i class="bi bi-bag"></i> My Orders</a></li>
                                
                                <li class="d-links "><a href="{{ route('auth.user.address') }}" ><i class="bi bi-house"></i>  Addresses</a></li> 
                                <li class="d-links"><a href="{{ route('auth.user.wishlist') }}" > <i class="bi bi-heart"></i> Wishlist</a></li>
                                
                                <li class="d-links"><a href="{{ route('auth.user.profile') }}" > <i class="bi bi-person"></i> Manage Profile</a></li>
                                <li class="d-links active"><a href="{{ route('auth.user.showlogoutform') }} " class="active-link"  > <i class="bi bi-box-arrow-right"></i> Logout</a></li>
                            </ul>
                        </div>
                        <div class="otherinfo">
                            <div class="dashboard-intro">
                                <h1>Logout</h1>
                                <p ></p>
                               
                            </div>
                           <div class="empty-order">
                                    
                                <span class="product-no">
                                    <i></i>
                                    Are you sure you want to logout ?
                                </span>
                               
                               
                               <form class="logout-form" method="post" action="{{ route('logout') }}">
                                    @csrf
                                    <input type="hidden" name="logout" value="confirmedLogout" />
                                    <button class="browse-btn-logout" type="submit" href="#" role="button">continue to Logout</button>
                               </form>
                               
                              
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