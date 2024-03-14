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
                                <form method="post" action="{{ route('password.update') }}">
                                    @csrf
                                    @method('put') 
                                    
                                    <div class="row form-row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="">Current Password (leave blank to leave unchanged)</label>
                                                <input class="form-control @error('current_password') is-invalid @enderror"  required="required" type="password" name="current_password" placeholder="Enter current password" autocomplete="off">
                                                @error('current_password')
                                                    <div class="help-block form-text with-errors form-control-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group ">
                                                <label >New Password (leave blank to leave unchanged)</label>
                                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="inputGroupFile01" name="password" placeholder="Enter new password">
                                                @error('password')
                                                    <div class="help-block form-text with-errors form-control-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group ">
                                                <label >Confirm New Password (leave blank to leave unchanged)</label>
                                                <input type="password" class="form-control  @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Enter password confirmation">
                                                @error('password_confirmation')
                                                    <div class="help-block form-text with-errors form-control-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-12 d-flex movebtnleft">
                                        <button class="btn btn-primiary" type="submit" name="premier">Change Password</button>
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