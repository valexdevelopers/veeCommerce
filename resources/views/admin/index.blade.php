<!doctype html>
<html>
    <head>
        <title>Home | Admin</title>
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
                            
                            @include('layouts.statistics')

                            
                            <!-- main page: transactions-order wrap row  -->
                            <div class="rows double-table-larger-table">
                                <!-- recent transactions: body wrap row  -->
                                {{-- <div class="rows recent-transactions with-box-shadow">
                                    <div class="recent-transactions-header">
                                        <div class="recent-transactions-heading">
                                            <h3>Recent Transactions</h3>
                                            <p>Total 58 Transactions done in this Month</p>
                                        </div>
                                        <div role="button">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </div>
                                    </div>
                                    <table class="recent-transactions-table table table-hover">
                                        <tbody>
                                            <tr class="grid-table-row">
                                                <td><img class="user-image" src="{{asset('admincontent/images/avatars/avartar-user.jpg') }}"></td>
                                                <td>Bank Transfer</td>
                                                <td>₦12,212.00</td>
                                            
                                                
                                            </tr>
                                            <tr class="grid-table-row">
                                                <td><img class="user-image" src="{{asset('admincontent/images/avatars/avartar-user.jpg') }}"></td>
                                                <td>Bank Transfer</td>
                                                <td>₦12,212.00</td>
                                            
                                                
                                            </tr>
                                            <tr class="grid-table-row">
                                                <td><img class="user-image" src="{{asset('admincontent/images/avatars/avartar-user.jpg') }}"></td>
                                                <td>Bank Transfer</td>
                                                <td>₦12,212.00</td>
                                            
                                                
                                            </tr>
                                            <tr class="grid-table-row">
                                                <td><img class="user-image" src="{{asset('admincontent/images/avatars/avartar-user.jpg') }}"></td>
                                                <td>Bank Transfer</td>
                                                <td>₦12,212.00</td>
                                            
                                                
                                            </tr>
                                            <tr class="grid-table-row">
                                                <td><img class="user-image" src="{{asset('admincontent/images/avatars/avartar-user.jpg') }}"></td>
                                                <td>Bank Transfer</td>
                                                <td>₦12,212.00</td>
                                            
                                                
                                            </tr>
                                            <tr class="grid-table-row">
                                                <td><img class="user-image" src="{{asset('admincontent/images/avatars/avartar-user.jpg') }}"></td>
                                                <td>Bank Transfer</td>
                                                <td>₦12,212.00</td>
                                            
                                                
                                            </tr>
                                            <tr class="grid-table-row">
                                                <td><img class="user-image" src="{{asset('admincontent/images/avatars/avartar-user.jpg') }}"></td>
                                                <td>Bank Transfer</td>
                                                <td>₦12,212.00</td>
                                            
                                                
                                            </tr>
                                            <tr class="grid-table-row">
                                                <td><img class="user-image" src="{{asset('admincontent/images/avatars/avartar-user.jpg') }}"></td>
                                                <td>Bank Transfer</td>
                                                <td>₦12,212.00</td>
                                            
                                                
                                            </tr>
                                        
                                        </tbody>
                                    </table>
                                    <div class="rows pagination-row-sm">
                                        <div class="grey-text page-number">
                                            showing 1-10 of 70
                                        </div>
                                        <div>
                                            <nav aria-label="Page navigation example">
                                                <ul class="pagination justify-content-end">
                                                <li class="page-item">
                                                    <a class="page-link" href="#" aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                    <span class="sr-only">Previous</span>
                                                    </a>
                                                </li>
                                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#" aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                    <span class="sr-only">Next</span>
                                                    </a>
                                                </li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div> --}}
                                    
                                <!-- recent orders: body wrap row  -->
                                @if($orders->count() < 1)
                                    <div class="not-added-wrap">
                                        <div class="not-added-yet">
                                            <div class="notadded-icon"> <i class="bi bi-shield-check"></i></div>
                                            <h3>You do not have any customer order yet</h3>
                                            <p>Customer orders will show up here as you add them, you can also add offline 
                                                orders for proper business management. </p>


                                            <div class="not-added-add-now">
                                                <a href="{{ route('admin.orders.create') }}"> Add Order </a>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="recent-orders white-bg with-box-shadow">
                                        <div class="rows recent-orders-header">
                                            <div class="count-invoice">
                                                <div class="recent-orders-count">
                                                    <span>10</span><i class="bi bi-chevron-down"></i>
                                                </div>
            
                                                <div class="">
                                                    <a href="#" class="create-invoice-btn darkblue-bg no-text-deco color-cream"> <i class="bi bi-plus"></i> <span>Create Invoice</span></a>
                                                
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

                                        <table class="table table-with-padding order-table-small ">
                                        
                                            <thead>
                                                <tr>
                                                    <td><input type="checkbox" class="" size="4" name="selected-row"></td>
                                                    <th>Id</tH>
                                                    <tH>status</tH>
                                                    <th>User</th>
                                                    
                                                    <tH>Date</tH>
                                                    <tH>Total</tH>
                                                    <th>Coupon </th>
                                                    <th>Amount</th>
                                                    <tH>Actions</tH>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($orders as $order)
                                                <tr >
                                                    <td><input type="checkbox" class="check-inbox" size="4" name="selected-row"></td>
                                                    <td>
                                                        <span title="{{ $order->id }}" class="product-id-truncated">{{ $order->unique_id }}</span></td>
                                                    <td class="grey-text" style="color: #6f6b7d;">
                                                        @php
                                                            if($order->order_status == 'pending payment'){
                                                                $color = 'color-yellow';
                                                                $bgcolor = 'yellow-bg';
                                                            }elseif($order->order_status == 'out for delivery'){

                                                                $color = 'color-blue';
                                                                $bgcolor = 'blue-bg';

                                                            }elseif($order->order_status == 'delivered'){
                                                                $color = 'color-green';
                                                                $bgcolor = 'green-bg';

                                                            }elseif($order->order_status == 'payment failed'){
                                                                $color = 'color-red';
                                                                $bgcolor = 'red-bg';
                                                            }
                                    
                                                        @endphp
                                                        <span class=" order-status {{ $bgcolor }} {{ $color }}  rounded-edges" >{{ $order->order_status}} </span> 
                                                    </td>
                                                    
                                                    <td class="">
                                                        <div class="product">
                                                            <div class="user-image-wrap">
                                                                <div class="product-avatar rounded-image-wrap">
                                                                    <span class="user-no-image rounded-image with-box-shadow white-bg color-blue">
                                                                        @php
                                                                            $letter1 = Str::upper(substr($order->orderUser->firstname, 0, 1));
                                                                            $letter2 = Str::upper(substr($order->orderUser->lastname, 0, 1));
                                                                        @endphp
                                                                        {{ $letter1}}{{ $letter2}}
                                                                    </span>
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="d-flex flex-column">
                                                                <h6 class="product-name  user-name-table mb-0" >{{ $order->orderUser->firstname}} {{ $order->orderUser->lastname}}</h6>
                                                                <small class="product-description-small">{{ $order->orderUser->email}}</small>
                                                            </div>
                                                        </div>
                                                            
                                                    </td>
                                                    <td class="grey-text" style="color: #6f6b7d;"><span>{{ $order->created_at->format('M d Y') }}</span> </td>
                                                    <td class="grey-text" style="color: #6f6b7d;"><span>₦{{number_format($order->total - $order->coupon_discount, 2)  }}</span> </td>

                                                    <td class="grey-text" style="color: #6f6b7d;"><span>{{ $order->orderCoupon->coupon_code  }}</span> </td>

                                                    <td class="grey-text" style="color: #6f6b7d;"><span>₦{{number_format($order->coupon_discount, 2)  }}</span> </td>
                                                    
                                                    
                                                    <td>
                                                        <div class="actions-td">
                                                            <a href="#" class="actions-btn grey-text no-text-deco" title="edit order"><i class="bi bi-pen"></i></a>
                                                            <a href="{{ route('admin.orders.show', $order_id = $order->id) }}" class="actions-btng grey-text no-text-deco" title="view more"><i class="bi bi-eye"></i></a>
                                                            <a  role="button" class="actions-btn grey-text no-text-deco" title="more actions" onclick="document.getElementById('extra-actions').style.display = 'block'; return false"><i class="bi bi-three-dots-vertical"></i></a>
                                                            <div class="extra-actions with-box-shadow white-bg" id="extra-actions">
                                                                <div class="close-row grey-bg-hover" ><a href="#" class="actions-btn-hidden no-text-deco " title="view more">Details</a> <i class="bi bi-x" role="button"  onclick="document.getElementById('extra-actions').style.display = 'none'"></i></div>
                                                                <div><a href="#" class="actions-btn-hidden no-text-deco grey-bg-hover" title="view more">Edit</a></div>
                                                                <form class="">
                                                                    <div class="row form-row">
                                                                        <div class="col-sm-12">
                                                                            <div class="form-group">
                                                                                <input type="hidden" class="form-control">
                                                                                <button class="extra-actions-btn delete-btn grey-bg-hover" type="submit" id="button-addon1" >Delete</button>

                                                                            </div>
                                                                        </div>
                                                                                                        
                                                                </form>  
                                                            </div>
                                                        </div>
                                                        
                                                    </td>
                                                </tr>
                                                @endforeach
                                                
                                            </tbody>
                                        </table>
                                        
                                        <div class="rows pagination-row">
                                            <div class="grey-text page-number">
                                               
                                            </div>
                                            <div>
                                                <nav aria-label="Page navigation example">
                                                    <ul class="pagination justify-content-end">
                                                        {{ $orders->links() }}
                                                    </ul>
                                                    </nav>
                                            </div>
                                        </div>
                                    </div>
                                @endif    

                                
                            </div>
                            <div>&nbsp;</div>
                            <div>&nbsp;</div>
                            <div>&nbsp;</div>
                            <div>&nbsp;</div>
                            <div>&nbsp;</div>
                            <div>&nbsp;</div>
                            <div>&nbsp;</div>
                            <div>&nbsp;</div>
                        </section>
                        
                        <div class="rows sticky-footer with-box-shadow" >
                            <div class="quickactions-container">
                                <div class="quickactions">
                                    <a href="{{ route('admin.products') }}" class="quickaction-link">
                                        <div class="action-icon red-bg">
                                            <i class="bi bi-tags color-red"></i>
                                        </div>
                                        <div class="link-name">
                                            <p>Products</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="quickactions">
                                    <a href="{{ route('admin.categories') }}" class="quickaction-link">
                                        <div class="action-icon purple-bg"><i class="bi bi-boxes color-purple"></i></div>
                                        <div class="link-name">
                                            <p>Categories</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="quickactions">
                                    <a href="{{ route('admin.brands') }}" class="quickaction-link">
                                        <div class="action-icon green-bg"><i class="bi bi-shield-check color-green"></i></div>
                                        <div class="link-name">
                                            <p>Brands</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="quickactions">
                                    <a href="{{ route('admin.discount') }}" class="quickaction-link">
                                        <div class="action-icon blue-bg"><i class="bi bi-flower2 color-blue"></i></div>
                                        <div class="link-name">
                                            <p>Run Sales</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="quickactions">
                                    <a href="{{ route('admin.coupons') }}" class="quickaction-link">
                                        <div class="action-icon yellow-bg"><i class="bi bi-percent color-yellow"></i></div>
                                        <div class="link-name">
                                            <p>Coupons</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="quickactions">
                                    <a href="{{ route('admin.orders.display') }}" class="quickaction-link">
                                        <div class="action-icon red-bg"><i class="bi bi-cart4 color-red"></i></div>
                                        <div class="link-name">
                                            <p>Orders</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="quickactions">
                                    <a href="{{ route('admin.users.show') }}" class="quickaction-link">
                                        <div class="action-icon blue-bg"><i class="bi bi-people color-blue"></i></div>
                                        <div class="link-name">
                                            <p>Users</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="quickactions">
                                    
                                </div>
                            </div>
                        </div>
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