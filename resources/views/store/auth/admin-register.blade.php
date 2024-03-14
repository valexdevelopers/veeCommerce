<!DOCTYPE html> 
<html>
    <head>
        <title>Admin Registration | Vee Commerce </title>
        @include('layouts.storeHeadContent')
    
    
    </head>
    <body>
        <div class="wrapper">
            <div class="page-wrapper">
                @include('layouts.admin-auth-header')
                <section class="dasboard-section" >
                    <div class="row-l dashboard-wrap">
                        <div class="dashboard-links">
                            <ul>
                                <li class="d-links active"><a href="{{ route('home') }}" class="active-link" ><i class="bi bi-house"></i> Home</a></li>
                                <li class="d-links "><a href="{{ route('admin.show.login') }}" ><i class="bi bi-lock"></i> Login</a></li>
                                
                                 
                                
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
                                <form method="post" action="{{ route('admin.create.register') }}">
                                    @csrf
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
                                    <div class="row form-row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1" class="form-label">Email <span class="star-required">*</span></label>
                                                <input type="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" name="email" >
                                                @error('email')
                                                    <div class="help-block form-text with-errors form-control-feedback">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="row form-row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="">First Name <span class="star-required">*</span></label>
                                                <input type="text" name="firstname" value="{{ old('firstname') }}" class="form-control @error('firstname') is-invalid @enderror" data-match-error="post topic"  required="required" >
                                                @error('firstname')
                                                    <div class="help-block form-text with-errors form-control-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group ">
                                                <label >Last Name <span class="star-required">*</span></label>
                                                <input type="text" value="{{ old('lastname') }}" class="form-control @error('lastname') is-invalid @enderror" name="lastname" >
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
                                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                                                @error('password')
                                                    <div class="help-block form-text with-errors form-control-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group ">
                                                <label >Confirm New Password <span class="star-required">*</span></label>
                                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation">
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
                                                <input  value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror" required="required" type="text" name="phone">
                                                @error('phone')
                                                    <div class="help-block form-text with-errors form-control-feedback"></div>  
                                                @enderror
                                                
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="col-sm-12 d-flex movebtnleft">
                                        <button class="btn btn-primiary" type="submit">Proceed</button>
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
                                                <input type="email" class="form-control" name="email" placeholder="Enter your email">
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
                @include('layouts.storeFooter')
                <!--Footer ends here-->
            </div>
        </div>
        
        @include('layouts.footer')
    </body>
</html>