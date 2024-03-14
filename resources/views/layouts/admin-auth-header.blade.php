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
                            
                            <li class="d-flex dropdown-item"><a href="{{ route('admin.show.login') }}" class="navbar-dropdown-item dropdown-item"><i class="bi bi-lock"></i>&nbsp;&nbsp;Login</a>  <span class="bi-x" id="close-user-dropdown" style="color: red"></span></li>
                            <li class="dropdown-item"><a href="{{ route('admin.show.register') }}" class="navbar-dropdown-item dropdown-item"><i class="bi bi-pencil-square"></i>&nbsp;&nbsp;Register</a></li>
                                
                          
                        </ul>
                    
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
                    
                    <section class="grey-border pb-3">
                        <section class="auth">
                            <li><a class="nav-list-item" href="{{ route('admin.show.login') }}"><i class="bi bi-lock"></i> <span>Login</span></a></li>
                            <li><a class="nav-list-item" href="{{ route('admin.show.register') }}"><i class="bi bi-pencil-square"></i> <span>Register</span></a></li>
                            
                        </section>
                        
                        
                    </section >
                   
                    
                    
                    

                    



                </ul>
                
            </div>
            
            
        </div>
    </div>
</section>