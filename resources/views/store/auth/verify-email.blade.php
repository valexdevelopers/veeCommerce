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
                            
                            <div class="address-wrap" >
                                
                                @if(Session::has('message'))
                                    <div class="alert {{ Session::get('message-color') }} alert-dismissible fade show" role="alert">
                                        <strong>{{ Session::get('message') }}</strong> 
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif
                                    @if (session('status') == 'verification-link-sent')
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>A new verification link has been sent to the email address you provided during registration.
                                            </strong> 
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                                            {{ __('') }}

                                        </div>
                                    @elseif(session('status') == 'email-changed')
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>Email changed. Click resend email verification to get a new link sent to your new email
                                            </strong> 
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @else

                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>Thanks for signing up! Before getting started, could you verify your email address by
                                                clicking on the link we just emailed to you? If you didn't receive the email, we will 
                                                gladly send you another.
                                            </strong> 
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif

                                

                                <form method="POST" action="{{ route('verification.send') }}">
                                    @csrf
                                    <div class="row form-row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <button class="btn btn-primiary " type="submit"> Resend Verification Email</button>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 d-flex movebtnleft">
                                            <div class="form-group">
                                                <a href="{{ route('auth.user.profile.changeemail') }}" class="btn btn-primiary" type="submit" name="premier">Change Email</a>
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