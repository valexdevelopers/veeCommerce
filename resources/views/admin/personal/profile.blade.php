<!doctype html>
<html>
    <head>
        <title>Profile | Admin</title>
        @include('layouts.adminHeadContent')
    </head>
    <style>
        
    </style>
    <body >
        <div class="page-wrapper">
            <section >
                <div class="rows mother-row">
                   
                    @include('layouts.adminmenu')


                    <!-- main page wrap -->
                    <div class="main-page-wrapper">
                        <!-- main page: header wrap row  -->
                        @include('layouts.adminStickyHeader')
                        
                        <!-- main page: roles-wrap wrap row  -->
                        <section class="scroll-y">
                            <div>
                                <div class="header-details">
                                    <div>
                                        <div class="order-id-wrap">
                                            <h6 class="" style="color: #57565d ;">User Profile </h6>
                                            
                                        </div>
                                        
                                       <small class=" order-extra-details">{{ Auth::guard('admin')->user()->created_at->format('l d m Y H:i:s') }}</small>
                                    </div>
                                    <div class="delete-order-container">
                                        <div></div>
                                    </div>
                                </div>
                                <div class="padding-5">
                                    @if(Session::has('message'))
                                        <div class="alert {{ Session::get('message-color') }} alert-dismissible fade show" role="alert">
                                            <strong>{{ Session::get('message') }}</strong> 
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif
                                    <div class="lg-grid-70-30 ">
                                        
                                        <div class=" grid-col-70 ">
                                             <div class=" grid-col-70 ">
                                                
                                                <div class="with-box-shadow white-bg rounded-edges padding-20">

                                                    <form method="post" action="{{ route('admin.profile.patch') }}">
                                                        @method('patch')
                                                        @csrf
                                                        <div class="">
                                                            <div class=""><h6 class="product-name">Personal Information</h6></div>
                                                            <div class="row form-row">
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label class="form-label">First Name</label>
                                                                        <input name="firstname" type="text" value="{{ Auth::guard('admin')->user()->firstname }}" class="form-control @error('firstname') is-invalid @enderror appearance-text-field" >
                                                                        @error('firstname') 
                                                                            <div class="help-block form-text with-errors form-control-feedback">{{$message}}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label class="form-label">Last Name</label>
                                                                        <input name="lastname" type="text" value="{{ Auth::guard('admin')->user()->lastname }}" class="form-control @error('lastname') is-invalid @enderror appearance-text-field" >
                                                                        @error('lastname') 
                                                                            <div class="help-block form-text with-errors form-control-feedback">{{$message}}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row form-row">
                                                                <div class="col-md-6 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label class="form-label">Phone</label>
                                                                        <input name="phone" type="tel" value="{{ Auth::guard('admin')->user()->phone }}" class="form-control @error('phone') is-invalid @enderror appearance-text-field" >
                                                                        @error('phone') 
                                                                            <div class="help-block form-text with-errors form-control-feedback">{{$message}}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row form-row">
                                                                <div class="col-sm-12">
                                                                    <div class="form-group thick">
                                                                        Password Change
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>

                                                            <div class="row form-row">
                                                                <div class="col-md-6 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label class="form-label">New Password  (leave blank to leave unchanged)</label>
                                                                        <input name="password" type="password" class="form-control @error('password') is-invalid @enderror appearance-text-field" placeholder="New Password">
                                                                        @error('password') 
                                                                            <div class="help-block form-text with-errors form-control-feedback">{{$message}}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label class="form-label">Confirm Password  (leave blank to leave unchanged)</label>
                                                                        <input name="password_confirmation" type="password" class="form-control  @error('password_confirmation') is-invalid @enderror appearance-text-field" placeholder="Confirm Password">
                                                                        @error('password_confirmation') 
                                                                            <div class="help-block form-text with-errors form-control-feedback">{{$message}}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row form-row">
                                                                
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                      <button type="submit" role="button" class="add-option darkblue-bg color-white rounded-edges" id="create-option-btn">Change</button>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                            
                                                        </div>
                                                    </form>
                                                    
                                                </div>
    
                                                
                                                
                                                
                                            </div>
                                            
                                        </div>


                                        <div class="grid-col-30 " >
                                            <div class="with-box-shadow white-bg rounded-edges padding-20">
                                               <div class="logged-in-user-container">
                                                    <div class="user-card">
                                                        <div><img src="{{asset('admincontent/images/avatars/avatar-1577909_1280.webp')}}" class="user-image-large rounded-edges" /></div>
                                                        <div class="name-id-container">
                                                            <h4>{{ Auth::guard('admin')->user()->firstname }} {{ Auth::guard('admin')->user()->lastname }}</h4>
                                                            <p>Customer ID #{{ Auth::guard('admin')->user()->unique_id }}</p>
                                                        </div>
                                                    </div>

                                                  
                                               </div>
                                                <div class="user-more mt-20 mt-20-sm">
                                                    <div><h4>Admin Details</h4></div>
                                                    <section class="mt-20 mt-20-sm">
                                                        <div class="user-more-details"><p><span class="user-details-header">User Id:</span> <span class="user-details-light">{{ Auth::guard('admin')->user()->unique_id }}</span></p></div>
                                                    <div class="user-more-details"><p><span class="user-details-header">Email:</span> <span class="user-details-light">{{ Auth::guard('admin')->user()->email }}</span></p></div>
                                                    <div class="user-more-details"><p><span class="user-details-header">Contact:</span> <span class="user-details-light">{{ Auth::guard('admin')->user()->phone }}</span></p></div>
                                                    
                                                    </section>
                                                    
                                                </div>
                                                
                                            </div>

                                            
                                            
                                        </div>
                                    </div>
                                    
                                </div>
                                
                                
                            </div>
                            
                            <div>&nbsp;</div>
                            <div>&nbsp;</div>
                        </section>
                    </div>
                </div>

                <!-- extra details for notification, available on click -->
                @include('layouts.adminNotification')
                <!-- extra details for notification ends here, available on click -->
                <!-- extra details for profile, available on click -->
                @include('layouts.adminProfile')
                <!-- extra details for profile ends here, available on click -->
            </section>
        </div>

        @include('layouts.adminFooter')
    </body>
    
</html>