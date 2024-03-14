<!DOCTYPE html> 
<html>
    <head>
        <title>Vee Commerce </title>
        <meta charset="utf-8">
        <meta content="view-port" >

        
        <!--bootstrap css and js -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        <!--Custom styles-->

        <link href="{{asset('content/themes/css/dashboardstyles.css') }} " rel="stylesheet" >
        <link href="{{asset('content/themes/css/mediascreens.css') }} " rel="stylesheet" >
        <link href="{{asset('content/themes/css/header-slider.css') }} " rel="stylesheet" >
    
    
    </head>
    <body>
        <div class="wrapper">
            <div class="page-wrapper">
                <section class="top-advert-section black" >
                    <div class="top-advert">
                        <div class="row-l">
                           
                        </div>
                    </div>
                </section>

                <section class="" >
                    <div class="row-l ">
                        <nav class="navbar navbar-expand-xxl " >
                            <div class=" d-flex navigations">
                                <div class="menu dropdown">
                                       <button type="menu" id="menuopen" class="menuopen " role="button" data-bs-toggle="dropdown" aria-expanded="false" onclick="openMenu();"><i class="bi-list-task"></i></button>
                                    
                                    <ul class="side-bar-d dropdown-menu ">
                                        <li><a class="nav-list-item dropdown-item" href="#"><i class="bi-backpack3"></i>Health &amp; beauty</a></li>
                                        <li><a class="nav-list-item dropdown-item" href="#"><i class="bi-backpack3"></i>Clothing</a></li>
                                        <li><a class="nav-list-item dropdown-item" href="#"><i class="bi-backpack3"></i>Clothing</a></li>
                                        <li><a class="nav-list-item dropdown-item" href="#"><i class="bi-backpack3"></i>Shoes</a></li>
                                        <li><a class="nav-list-item dropdown-item" href="#"><i class="bi-backpack3"></i>Bags</a></li>
                                        <li><a class="nav-list-item dropdown-item" href="#"><i class="bi-backpack3"></i>Children</a></li>
                                        <li><a class="nav-list-item dropdown-item" href="#"><i class="bi-backpack3"></i>Men</a></li>
                                        <li><a class="nav-list-item dropdown-item" href="#"><i class="bi-backpack3"></i>Women</a></li>
                                        
                                        <li><a class="nav-list-item dropdown-item" href="#"><i class="bi-backpack3"></i>Flash Sales</a></li>
                                        <li><a class="nav-list-item dropdown-item" href="#"><i class="bi-backpack3"></i>Limited Stock Deals</a></li>
                                        <li><a class="nav-list-item dropdown-item" href="#"><i class="bi-backpack3"></i>Mega Saver</a></li>
                                        <li><a class="nav-list-item dropdown-item" href="#"><i class="bi-backpack3"></i>Shop Brands</a></li>
                                        <li><a class="nav-list-item dropdown-item" href="#"><i class="bi-backpack3"></i>Shop Categories</a></li>
                                        <li><a class="nav-list-item dropdown-item" href="#"><i class="bi-backpack3"></i>New Arrivals</a></li>
                                        <li><a class="nav-list-item dropdown-item" href="#"><i class="bi-backpack3"></i>Clearance Sales</a></li>
    
    
    
    
    
                                    </ul>
                                </div>
        
                                <div class="navbar-brand logo-wrap">
                                    <img class="logoimg" src="{{asset('content/uploads/logo/logo.png') }}">
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
                                    <button class="d-flex " id="user-dropdown-btn" role="button" data-bs-toggle="dropdown" aria-expanded="false"   ><a href="#" class="  navcart"><i class="bi-person-circle person-drop"></i> <span class="md-none sm-none">Account</span></a></button>
                                    <ul class="user-dropdown-menu dropdown-menu" id="user-dropdown-menu">
                                        
                                        <li class="d-flex dropdown-item"><a href="" class="navbar-dropdown-item dropdown-item"><i></i>EgeregaV</a>  <span class="bi-x" onclick="closeuserdrop()"></span></li>
                                        <li><a href="" class="navbar-dropdown-item dropdown-item"><i></i>logout</a></li>
                                    </ul>
                                </div>
                                <div class="nav-cart orange">
                                    <button class="navcartbtn"><a href="" class="navcart"><i class="bi-cart"></i><sup class="" style="color: rgb(0, 0, 0);">5</sup> <span class="sm-none md-none">Cart</span></a></button>
                                </div>
                                
                          
                            </div>
                        </nav>
                    </div>
                </section>
                <section class="dasboard-section" >
                    <div class="row-l dashboard-wrap">
                        <div class="dashboard-links">
                            <ul>
                                <li class="d-links active"><a href="#" class="active-link" ><i class="bi bi-house"></i> Home</a></li>
                                
                                
                                 
                                
                            </ul>
                        </div>
                        <div class="otherinfo">
                            <div class="dashboard-intro">
                                <div class="title-header">
                                    <h1>Login</h1>
                                </div>
                                
                                <p ></p>
                               
                            </div>
                            
                            <div class="address-wrap">
                                <form method="POST" action="{{ route('admin.create.login') }}">
                                    @csrf
                                    @if(Session::has('message'))
                                        <div class="alert {{ Session::get('message-color') }} alert-dismissible fade show" role="alert">
                                            <strong>{{ Session::get('message') }}</strong> 
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif

                                    <div class="row form-row">
                                        
                                        <div class="col-sm-12">
                                            <div class="form-group ">
                                                <label >Email or Username <span class="star-required">*</span></label>
                                                <input type="email" class="form-control @error('email') is-invalid @enderror"  name="email" required>
                                                @error('email')
                                                    <div class="help-block form-text with-errors form-control-feedback"></div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="row form-row">
                                        
                                        
                                        <div class="col-sm-12">
                                            <div class="form-group ">
                                                <label >Password <span class="star-required">*</span></label>
                                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                                                @error('password')
                                                    <div class="help-block form-text with-errors form-control-feedback"></div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="col-sm-12 login-forgotpassword">
                                        <a href="#" class="f-left">Forgot password?</a>
                                        <button class="btn btn-primiary width-30-percent f-right" type="submit"> Proceed</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>

               <section class="support">
                    <div class="row-l">
                        <div class="support-header">
                            <h1>AWARD WINNING SUPPORT</h1>
                        </div>
                     
                        <div class="rounded-square">

                        </div>
                       
                        <div class="support-wrap">
                            <div class="support-infowrap">

                                <div class="support-each">
                                    <div class="support-img">
                                        <img src="{{asset('content/uploads/svg/email.svg') }}"/>
                                    </div>
                                    <div class="support-info">
                                        <p>Email</p>
                                        <p>support@VeeCommerce.com</p>
                                    </div>

                                    <div class="support-btn">
                                        
                                            <a href="mailto" role="button" class="">Send an email</a>
                                        
                                        
                                    </div>
                                </div>

                                <div class="support-each">
                                    <div class="support-img">
                                        <img src="{{asset('content/uploads/svg/livechat.svg') }}"/>
                                    </div>
                                    <div class="support-info">
                                        <p>Live Chat</p>
                                        <p>Ask a question right now</p>
                                    </div>

                                    <div class="support-btn">
                                        <a href="mailto" role="button" class="">Start a chat</a>
                                    </div>
                                </div>

                                <div class="support-each">
                                    <div class="support-img">
                                        <img src="{{asset('content/uploads/svg/callus.svg') }}"/>
                                    </div>
                                    <div class="support-info">
                                        <p>WhatsApp</p>
                                        <p>Talk to our experts</p>
                                    </div>

                                    <div class="support-btn">
                                        <a href="mailto" role="button" class="">+2348074036471</a>
                                    </div>
                                </div>
                            </div>

                            <div class="support-form-wrap">
                                <h3>Contact us</h3>
                                <form >

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="">Your Name*</label>
                                                <input class="form-control" data-match-error="post topic"  required="required" type="text" name="name">
                                                <div class="help-block form-text with-errors form-control-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group ">
                                                <label >Your Email*</label>
                                                <input type="email" class="form-control" id="inputGroupFile01" name="email" placeholder="Enter your email">
                                                <div class="help-block form-text with-errors form-control-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Enter your questions, complaints or enquiries..."></textarea>
                                                <div class="help-block form-text with-errors form-control-feedback"></div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="col-sm-12 d-flex movebtnleft">
                                        <button class="btn btn-primiary" type="submit" name="premier"> Send message</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                       
                        
                    </div>
               </section>
                
                
              
                
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
                                            Jumia Nigeria is the largest online shopping website in Nigeria. 
                                            We offer a platform where customers in any part of Nigeria can find and shop 
                                            for all they need in one online store and that platform is the Jumia shopping website.
                                             On the Jumia mobile app or website, you can shop from the comfort of your home or during 
                                             work breaks and get everything delivered fast without you having to stress or move an inch.
                                              Be it fashion, electronics, mobile phones, computers,
                                             or your everyday groceries you can get everything you need on Jumia online store.
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
        
        <script type="text/javascript" src="{{asset('content/themes/js/slider.js') }}"></script>
        <script type="text/javascript" src="{{asset('content/themes/js/flash-sales-slider.js') }}"></script>
    </body>
</html>