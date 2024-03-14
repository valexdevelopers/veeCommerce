<!doctype html>
<html>
    <head>
        <title>New Order | Admin</title>
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
                                            <h6 class="">New Order </h6>
                                            
                                        </div>
                                        
                                       <small class="order-extra-details">Add Offline Orders here</small>
                                    </div>
                                    <div class="delete-order-container">
                                        <div><a href="{{ route('admin.orders.display') }}" class="red-bg color-red button-1 no-text-deco">View Orders</a></div>
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
                                    <form method="post" action="{{ route('admin.discount.create') }}">
                                        @csrf
                                        <div class="lg-grid-70-30 ">
                                            <div class=" grid-col-70 mt-20 mt-20-sm">
                                                <div class="with-box-shadow white-bg rounded-edges padding-20">
                                                    <div class=""><h6 class="product-name">Sales Information</h6></div>
                                                    <div class="row form-row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Sales Description</label>
                                                                <input value="{{ old('discount_name') }}" name="discount_name" type="text" class="form-control  @error('coupon_code') is-invalid  @enderror appearance-text-field" placeholder="Black friday sales! 10% off" required>
                                                                @error('coupon_code') 
                                                                    <div class="help-block form-text with-errors form-control-feedback">{{$message}}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row form-row">
                                                        <div class="col-md-6 col-sm-6">
                                                            <div class="form-group">
                                                               <label class="form-label">Valid From</label>
                                                               <input value="{{ old('discount_start_date') }}" name="discount_start_date" type="datetime-local" class="form-control  @error('discount_start_date') is-invalid  @enderror appearance-text-field" required>
                                                               <div class="help-block form-text more-info"><i class="bi bi-exclamation-octagon" style="color: rgb(248, 37, 5); font-size: 13px;"></i>&nbsp;To start your sale Immediately put the today's date.</div>

                                                               @error('discount_start_date') 
                                                                    <div class="help-block form-text with-errors form-control-feedback">{{$message}}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6">
                                                            <div class="form-group">
                                                               <label class="form-label">Valid To</label>
                                                               <input value="{{ old('discount_end_date') }}" name="discount_end_date" type="date" class="form-control  @error('discount_end_date') is-invalid  @enderror appearance-text-field"  required>
                                                                @error('discount_end_date') 
                                                                    <div class="help-block form-text with-errors form-control-feedback">{{$message}}</div>
                                                                @enderror
                                                                
                                                                
                                                            </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                
                                                                @include('layouts.orderProducts')
                                                                <label class="form-label flexed-label" ><span class="flexed-label-span">Add Products</span> <a href="{{ route('admin.product.new') }}" class="flexed-label-anchor">New Product</a></label>
                                                                <select class="form-select"  id="country" name="product_category"  >
                                                                    <option value="" id="selectProductsbtn">Select Product </option>
                                                                    
                                                                    
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                
                                                
                                              
                                                
                                            </div>


                                            <div class="grid-col-30 mt-20 mt-20-sm" >
                                                <div class="with-box-shadow white-bg rounded-edges padding-20">
                                                    <div class=""><h6 class="product-name">Sales Information</h6></div>
                                                    <div class="row form-row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                               <label class="form-label">Discount Type</label>
                                                               <select class="form-select"  id="discount_type" name="discount_type" required>
                                                                    <option value="percentage" id="percentage" selected>Percentage</option>
                                                                    <option value="fixed" id="fixed">Fixed</option>
                                                                
                                                            </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="row form-row" id="percentage_discount">
                                                        <div class="col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Percentage Discount</label>
                                                                <input min="1" max="90" value="{{ old('discount_value') }}" name="discount_value" id="discount_value_percentage" type="number" class="form-control  @error('discount_value') is-invalid  @enderror appearance-text-field" placeholder="Percentage Discount">
                                                                @error('discount_value') 
                                                                    <div class="help-block form-text with-errors form-control-feedback">{{$message}}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-row" id="discount_amount" style="display: none;">
                                                        <div class="col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Discount Amount</label>
                                                                <input  value="{{ old('discount_value') }}" id="discount_value_fixed" type="number" class="form-control  @error('discount_value') is-invalid  @enderror appearance-text-field" placeholder="Discount Amount" >
                                                                @error('discount_value') 
                                                                    <div class="help-block form-text with-errors form-control-feedback">{{$message}}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-row" id="discount_max_value" >
                                                        <div class="col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Max Discount Amount (Optional)</label>
                                                                <input min="1" value="{{ old('discount_max_value') }}" name="discount_max_value" type="number" class="form-control @error('discount_max_value') is-invalid  @enderror appearance-text-field" placeholder="Max Discount Amount" >
                                                                <div class="help-block form-text more-info"><i class="bi bi-exclamation-octagon" style="color: rgb(248, 37, 5); font-size: 13px;"></i>&nbsp; The total amount of this discount can not exceed this value</div>
                                                                @error('discount_max_value') 
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