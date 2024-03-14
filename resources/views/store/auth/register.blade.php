<!DOCTYPE html> 
<html>
    <head>
        <title>New Registration | Vee Commerce </title>
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
                                <li class="d-links "><a href="{{ route('login') }}" class="active-link" ><i class="bi bi-lock"></i> Login</a></li>  
                                
                                 
                                
                            </ul>
                        </div>
                        <div class="otherinfo">
                            <div class="dashboard-intro">
                                <div class="title-header">
                                    <h1>Registration</h1>
                                </div>
                                
                                <p ></p>
                               
                            </div>
                            
                            <div class="address-wrap">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if(Session::has('message'))
                                    <div class="alert {{ Session::get('message-color') }} alert-dismissible fade show" role="alert">
                                        <strong>{{ Session::get('message') }}</strong> 
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif
                                <form action="{{ route('auth.user.register') }}" method="POST">
                                    @csrf
                                    <div class="row form-row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1" class="form-label">Email <span class="star-required">*</span></label>
                                                <input value="{{ old('email') }}" type="email" class="form-control @error('email') is-invalid @enderror"  name="email"  required>
                                                @error('email')
                                                    <div class="help-block form-text with-errors form-control-feedback">{{ $message }}</div>
                                                @enderror
                                                
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="row form-row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="">First Name <span class="star-required">*</span></label>
                                                <input value="{{ old('firstname') }}" class="form-control @error('firstname') is-invalid @enderror"  required="required" type="text" name="firstname" >
                                                @error('firstname')
                                                    <div class="help-block form-text with-errors form-control-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group ">
                                                <label >Last Name <span class="star-required">*</span></label>
                                                <input value="{{ old('lastname') }}" type="text" class="form-control @error('lastname') is-invalid @enderror"  required="required"  name="lastname" >
                                                @error('lastname')
                                                    <div class="help-block form-text with-errors form-control-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                     <div class="row form-row">
                                        <div class="col-sm-6">
                                            <div class="form-group ">
                                                <label >New Password <span class="star-required">*</span></label>
                                                <input type="password" class="form-control @error('password') is-invalid @enderror"  name="password" required="required">
                                                @error('password')
                                                    <div class="help-block form-text with-errors form-control-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group ">
                                                <label >Confirm New Password <span class="star-required">*</span></label>
                                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"  name="password_confirmation" required="required">
                                                @error('password_confirmation')
                                                    <div class="help-block form-text with-errors form-control-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-row">
                
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="">Mobile No <span class="star-required">*</span></label>
                                                <input value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror"  required="required" type="text" name="phone">
                                                @error('phone')
                                                    <div class="help-block form-text with-errors form-control-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="col-sm-12 d-flex movebtnleft">
                                        <button class="btn btn-primiary" type="submit"> Proceed</button>
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