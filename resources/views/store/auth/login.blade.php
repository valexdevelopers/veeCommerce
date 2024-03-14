<!DOCTYPE html> 
<html>
    <head>
        <title>Login | Vee Commerce </title>
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
                                <li class="d-links active"><a href="{{route('store.shop')}}" class="active-link" ><i class="bi bi-house-door"></i> Shop</a></li>
                                @auth
                                    <li class="d-links "><a role="button" type="button"  data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="active-link" ><i class="bi bi-box-arrow-right"></i> Logout</a></li>
                                @else
                                    <li class="d-links "><a href="{{ route('register') }}" class="active-link" ><i class="bi bi-pencil-square"></i> Register</a></li>  
                                @endauth
                               
                                
                                
                                 
                                
                            </ul>
                        </div>
                        <div class="otherinfo">
                            <div class="dashboard-intro">
                                <div class="title-header">
                                    <h1>Login</h1>
                                </div>
                                
                                <p ></p>
                               
                            </div>
                            
                            <div class="address-wrap" method="post" action="{{ route('auth.user.store') }}">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Please login if you are a registered user or signup</strong> 
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                
                                <form action="{{ route('auth.user.store') }}" method="POST">
                                    @csrf
                                    <div class="row form-row">
                                        
                                        <div class="col-sm-12">
                                            <div class="form-group ">
                                                <label >Email or Username <span class="star-required">*</span></label>
                                                <input  value="{{ old('email') }}" type="email" class="form-control"  name="email" required>
                                                <div class="help-block form-text with-errors form-control-feedback"></div>
                                            </div>
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="row form-row">
                                       <div class="col-sm-12">
                                            <div class="form-group ">
                                                <label >Password <span class="star-required">*</span></label>
                                                <input type="password" class="form-control"  name="password" required>
                                                <div class="help-block form-text with-errors form-control-feedback"></div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="col-sm-12 d-flex space-between">
                                        <a href="#" class="f-left">Forgot password?</a>
                                        <button class="btn btn-primiary width-30-percent f-right" type="submit"> Proceed</button>
                                    </div>
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