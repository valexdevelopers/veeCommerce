<!doctype html>
<html>
    <head>
        <title>New Coupon | Admin</title>
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
                                            <h6 class="">New Coupon </h6>
                                            
                                        </div>
                                        
                                       <small class="order-extra-details">Add new coupon here</small>
                                    </div>
                                    <div class="delete-order-container">
                                        <div><a href="{{ route('admin.coupons') }}" class="red-bg color-red button-1 no-text-deco">View Coupons</a></div>
                                    </div>
                                </div>
                                <div class="padding-5">
                                    @if($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach($errors->all() as $error)
                                                    <li>{{ $error }}<li>
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
                                    <form method="post" action="{{ route('admin.coupon.create') }}">
                                        @csrf
                                        <div class="lg-grid-70-30 ">
                                            <div class=" grid-col-70 mt-20 mt-20-sm">
                                                <div class="with-box-shadow white-bg rounded-edges padding-20">
                                                    <div class=""><h6 class="product-name">Coupon Information</h6></div>
                                                    <div class="row form-row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Coupon Code</label>
                                                                <input name="coupon_code" type="text" class="form-control  @error('coupon_code') is-invalid  @enderror appearance-text-field" placeholder="Coupon Code" required>
                                                                @error('coupon_code') 
                                                                    <div class="help-block form-text with-errors form-control-feedback">{{$message}}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row form-row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                               <label class="form-label">Coupon Restriction</label>
                                                               <select class="form-select"  id="country" name="coupon_resctriction" required>
                                                                <option value="" selected disabled>Select Coupon Restriction Status</option>
                                                                <option value="all_users">All Users</option>
                                                                <option value="first_timers">First Time Buyers</option>
                                                                <option value="returning_users">Returing Customers</option>
                                                                
                                                                
                                                            </select>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                </div>
                                                
                                                
                                              
                                                
                                            </div>


                                            <div class="grid-col-30 mt-20 mt-20-sm" >
                                                <div class="with-box-shadow white-bg rounded-edges padding-20">
                                                    <div class=""><h6 class="product-name">Coupon Information</h6></div>
                                                
                                                   
                                                    <div class="row form-row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Percentage Discount</label>
                                                                <input name="coupon_worth" type="number" class="form-control  @error('coupon_worth') is-invalid  @enderror appearance-text-field" placeholder="Percentage Discount" required>
                                                                @error('coupon_worth') 
                                                                    <div class="help-block form-text with-errors form-control-feedback">{{$message}}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Max Discount Amount (Optional)</label>
                                                                <input name="max_value" type="number" class="form-control @error('max_value') is-invalid  @enderror appearance-text-field" placeholder="Max Discount Amount" >
                                                                @error('max_value') 
                                                                    <div class="help-block form-text with-errors form-control-feedback">{{$message}}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                               <button class="btn btn-primary green-bg color-green button-2">Click to Proceed</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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