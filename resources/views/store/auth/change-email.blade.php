<!DOCTYPE html> 
<html>
    <head>
        <title>Email Verification | Vee Commerce </title>
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
                                <li class="d-links active"><a href="{#}" class="active-link" ><i class="bi bi-house-door"></i> Shop</a></li>
                                
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
                                    <h1>Verification</h1>
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
                                <form method="post" action="{{ route('auth.user.profile.changeemail.update') }}">
                                    @csrf
                                    @method('patch') 
                                    <div class="row form-row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1" class="form-label">Email <span class="star-required">*</span></label>
                                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}">
                                                @error('email')
                                                    <div class="help-block form-text with-errors form-control-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="row form-row">
                                        
                                        <div class="col-sm-12 d-flex movebtnleft">
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