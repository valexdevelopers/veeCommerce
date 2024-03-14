<!doctype html>
<html>
    <head>
        <title>Discount Sales | Admin</title>
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
                            

                            <!-- main page: transactions-order wrap row  -->
                            <div class="rows single-table-larger-table">
                                
                                    
                                <!-- recent orders: body wrap row  -->
                                <div class="recent-orders white-bg with-box-shadow">
                                    @if(Session::has('message'))
                                        <div class="alert {{ Session::get('message-color') }} alert-dismissible fade show" role="alert">
                                            <strong>{{ Session::get('message') }}</strong> 
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif
                                    <div class="rows recent-orders-header">
                                        <div class="count-invoice">
                                            <div class="recent-orders-count">
                                                <span>10</span><i class="bi bi-chevron-down"></i>
                                            </div>
        
                                            <div class="">
                                                <a href="{{ route('admin.discount.new') }}" class="create-invoice-btn darkblue-bg no-text-deco color-cream"> <i class="bi bi-plus"></i> <span>Start Sales</span></a>
                                            
                                            </div>
                                        </div>
                                        

                                        <div class="inner-search">
                                            <form>

                                                <div class="row form-row inner-search-form-row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="Search Orders" aria-label="Example text with button addon" aria-describedby="button-addon1">  
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <select class="form-select" aria-label="Default select example">
                                                                <option selected>Filter</option>
                                                                <option value="1">One</option>
                                                                <option value="2">Two</option>
                                                                <option value="3">Three</option>
                                                            </select>  
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <button class="inner-search-btn btn btn-outline-secondary darkblue-bg color-cream" type="submit" id="button-addon1"><i class="bi bi-search"></i></button>
    
                                                        </div>
                                                    </div>
                                                </div>                                 
                                            </form>
                                        </div>
                                    </div>
                                    
                                    @if($discounts->count() == 0)
                                        <div class="not-added-wrap">
                                            <div class="not-added-yet">
                                                <div class="notadded-icon"> <i class="bi bi-shield-check"></i></div>
                                                <h3>You have not started any discount sale yet</h3>
                                                <p>Discount Sales will show up here as you add them, ensure to add coupons or 
                                                    discounts for sales for festive periods. </p>


                                                <div class="not-added-add-now">
                                                    <a href="{{ route('admin.discount.new') }}">Start a Discount Sale</a>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <table class="table product-table">
                                        
                                            <thead>
                                                <tr >
                                                    <td><input type="checkbox" class="" size="4" name="selected-row"></td>
                                                    <td>ID</td>
                                                    <td>Status</td>
                                                    <td>Discount</td>
                                                    <td>Type</td>
                                                    <td>Amount</td>
                                                    <td>Max Amount</td>
                                                    <td>Start</td>
                                                    <td>End</td>
                                                    <td>Actions</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($discounts as $discount)
                                                    <tr >
                                                        <td><input type="checkbox" class="" size="4" name="selected-row"></td>
                                                        <td>
                                                            @php
                                                                if($discount->status > 0){
                                                                    $status = 'Ongoing';
                                                                    $color = 'color-green';
                                                                    $bgcolor = 'green-bg';
                                                                }else{
                                                                    $status = 'Inactive';
                                                                    $color = 'color-red';
                                                                    $bgcolor = 'red-bg';

                                                                }
                                    
                                                            @endphp
                                                        <span class="order-status {{ $bgcolor }} {{ $color }}  rounded-edges" >{{ $status}} </span> 
                                                        </td>
                                                        <td>
                                                            <span title="{{ $discount->id }}" class="product-id-truncated">{{ $discount->unique_id }}</span>
                                                        </td>
                                                        
                                                        
                                                        <td class="grey-text"><span>{{ $discount->discount_name }}</span> </td>
                                                        <td class="grey-text"><span>{{ $discount->discount_type }}</span> </td>

                                                        <td class="grey-text"><span>
                                                            @if($discount->discount_type == 'percentage')
                                                                {{ $discount->discount_value }}%
                                                            @else 
                                                                ₦{{ number_format($discount->discount_value, 2) }}
                                                            @endif
                                                            </span> 
                                                        </td>
                                                        <td class="grey-text"> <span>
                                                            @empty($discount->discount_max_value)
                                                                Not set
                                                            @else
                                                                ₦{{ number_format($discount->discount_max_value, 2) }}
                                                            @endempty
                                                            
                                                        </span></td>
                                                        
                                                        <td class="grey-text"><span>{{ date('l d M Y H:i:s', strtotime($discount->discount_start_date)) }}</span> </td>
                                                        <td class="grey-text"><span>{{ date('l d M Y H:i:s', strtotime($discount->discount_end_date)) }}</span> </td>
                                                        <td>
                                                            <div class="actions-td">
                                                                @if($discount->status > 0)
                                                                    <a  href="{{ route('admin.discount.stop', $discount_id = $discount->id) }}" class="actions-btn grey-text no-text-deco" title="Pause Sale" ><i class="bi bi-pause"></i></a>
                                                                @else
                                                                    <a  href="{{ route('admin.discount.start', $discount_id = $discount->id) }}" class="actions-btn grey-text no-text-deco" title="start Sale" ><i class="bi bi-play"></i></a>
                                                                @endif

                                                                <a  href="{{ route('admin.discount.delete', $discount_id = $discount->id) }}" class="actions-btn grey-text no-text-deco" title="delete" ><i class="bi bi-trash"></i></a>
                                                                
                                                            </div>
                                                            
                                                        </td>
                                                        
                                                    </tr>
                                                @endforeach
                                                
                                                  
                                            </tbody>
                                        </table>
                                        
                                        <div class="rows pagination-row">
                                           
                                            <div>
                                                <nav aria-label="Page navigation example">
                                                    <ul class="pagination justify-content-end">
                                                        {{ $discounts->links() }}
                                                    </ul>
                                                    </nav>
                                            </div>
                                        </div>
                                    @endif
                                    
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