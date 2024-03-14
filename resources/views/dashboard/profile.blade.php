<!DOCTYPE html> 
<html>
    <head>
        <title>Profile | Vee Commerce </title>
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
                                
                                <li class="d-links"><a href="{{ route('auth.user.address') }}" ><i class="bi bi-house"></i>  Addresses</a></li> 
                                <li class="d-links"><a href="{{ route('auth.user.wishlist') }}" > <i class="bi bi-heart"></i> Wishlist</a></li>
                                
                                <li class="d-links active"><a href="{{ route('auth.user.profile') }}" class="active-link"> <i class="bi bi-person"></i> Manage Profile</a></li>
                                <li class="d-links"><a href="{{ route('auth.user.showlogoutform') }}" > <i class="bi bi-box-arrow-right"></i> Logout</a></li>
                            </ul>
                        </div>
                        <div class="otherinfo">
                            <div class="dashboard-intro">
                                <h1>Profile</h1>
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
                                <form method="post" action="{{ route('auth.user.profile.update') }}">
                                    @csrf
                                    @method('patch') 
                                    <div class="row form-row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="">First Name <span class="star-required">*</span></label>
                                                <input class="form-control @error('firstname') is-invalid @enderror" value="{{ Auth::user()->firstname }}" required="required" type="text" name="firstname">
                                                @error('firstname')
                                                    <div class="help-block form-text with-errors form-control-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group ">
                                                <label >Last Name <span class="star-required">*</span></label>
                                                <input type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ Auth::user()->lastname }}" required="required">
                                                @error('lastname')
                                                    <div class="help-block form-text with-errors form-control-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="" class="form-label">Phone</label>
                                                <input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" required="required" value="{{ Auth::user()->phone }}">
                                                @error('phone')
                                                    <div class="help-block form-text with-errors form-control-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                    </div>


                                    <div class="row form-row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1" class="form-label">Email <span class="star-required">*</span></label>
                                                <input type="email" class="form-control @error('email') is-invalid @enderror" readonly name="email" value="{{ Auth::user()->email }}">
                                                @error('email')
                                                    <div class="help-block form-text with-errors form-control-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="row form-row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <a href="{{ route('auth.user.password.show') }}" class="btn btn-primiary" type="submit" name="premier">Change Password</a>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 d-flex movebtnleft">
                                            <div class="form-group">
                                                <button class="btn btn-primiary" type="submit" name="premier"> Save Changes</button>
                                            </div>
                                        </div>
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