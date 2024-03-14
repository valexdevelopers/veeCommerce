<!doctype html>
<html>
    <head>
        <title>{{ $user->firstname }} {{ $user->lastname }} | Home</title>
        @include('layouts.adminHeadContent')
    </head>
    <style>
        
    </style>
    <body >
        @include('layouts.modal')
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
                                            <h6 class="" style="color: #57565d ;">Customer ID #{{ $user->unique_id }}</h6>
                                            
                                        </div>
                                        
                                       <small class=" order-extra-details">{{ $user->created_at->format('M d, Y, H:i') }}</small>
                                    </div>
                                    <div class="delete-order-container">
                                        <div><a href="{{ route('admin.users.show') }}" class="red-bg color-red button-1 no-text-deco">View all users</a></div>
                                    </div>
                                </div>
                                <div class="padding-5">
                                    
                                    <div class="lg-grid-70-30 ">
                                        <div class=" grid-col-70 ">
                                            <div class="wishlist-coupon-container">
                                                <div class="with-box-shadow white-bg rounded-edges padding-20">
                                                    <div class="header-icon ">
                                                        <div class="rounded-edges"><i class="bi bi-bookmarks" style="color: #ff9f43;"></i></div>
                                                    </div>
                                                    <div class="header-details">
                                                        <h6>Wishlist</h6>
                                                    </div>
                                                    <div class="coupon-count">
                                                        <p>
                                                            <span class="card-count" style="color: #ff9f43;">{{ $user->wishlistowned->count() }}</span> <span class="card-details">Items in wishlist</span>
                                                        </p>
                                                    </div>
                                                    <div class="further-details"><p>This customer has {{ $user->wishlistowned->count() }} items saved.</p></div>


                                                </div>
                                                <div class="with-box-shadow white-bg rounded-edges padding-20">
                                                    <div class="header-icon">
                                                        <div class="rounded-edges"><i class="bi bi-cart3" style="color: #00cfe8;"></i></div>
                                                    </div>

                                                    <div class="header-details">
                                                        <h6>Cart</h6>
                                                    </div>
                                                    <div class="coupon-count">
                                                        <p>
                                                            <span class="card-count" style="color: #00cfe8;">{{ $user->cartsOwned->count() }}</span> <span class="card-details">Items in cart</span>
                                                        </p>
                                                        
                                                    </div>
                                                    <div class="further-details"><p>This customer has {{ $user->cartsOwned->count() }} items in their  cart.</p></div>

                                                </div>
                                            </div>

                                            
                                            <div class=" grid-col-70 mt-20 mt-20-sm ">
                                                <div class="with-box-shadow white-bg rounded-edges padding-20">
                                                    <div class=""><h6 class="product-name">Order details</h6></div>
                                                    <div class="scroll-table">
                                                        @if($orders->count() == 0)
                                                            <div class="not-added-wrap">
                                                                <div class="not-added-yet">
                                                                    <div class="notadded-icon"> <i class="bi bi-cart4"></i></div>
                                                                    <h3>This user have not made any orders yet</h3>
                                                                    <p>Orders will show up here as they make purchases. </p>
                        
                        
                                                                    
                                                                </div>
                                                            </div>
                                                        @else
                                                            <table class="uppercase-head table product-table ">
                                                                <thead>
                                                                    <tr>
                                                                        <td><input type="checkbox" class="" size="4" name="check-all"></td>
                                                                        <td>Order</td>
                                                                        <td>date</td>
                                                                        <td>Status</td>
                                                                        <td>Total</td>
                                                                        <td>Actions</td>
                                                                    </tr>
                                                                </thead>
                                                                
                                                                    <tbody>
                                                                        @foreach($orders as $order)
                                                                            
                                                                        
                                                                        <tr >
                                                                            <td><input type="checkbox" class="" size="4" name="selected-row"></td>
                                                                            <td>
                                                                                <span style="color: #719ebd;">#{{ $order->unique_id }}</span>
                                                                                
                                                                            </td>
                                                                            
                                                                            <td class="grey-text" style="color: #6f6b7d;"><span>{{ $order->created_at->format('M d Y') }}</span> </td>
                                                                        
                                                                            
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
                                                                                <span class="order-status {{ $bgcolor }} {{ $color }}  rounded-edges" >{{ $order->order_status}} </span> 
                                                                            </td>
                                                                            <td class="grey-text" style="color: #6f6b7d;"><span>₦{{number_format($order->total, 2)  }}</span> </td>
                                                                            <td>
                                                                                <div class="actions-td">
                                                                                    
                                                                                    <a href="{{ route('admin.orders.show', $order_id = $order->id) }}" class="actions-btng grey-text no-text-deco" title="view more"><i class="bi bi-eye"></i></a>
                                                                                    <a  role="button" class="actions-btn grey-text no-text-deco" title="more actions" onclick="document.getElementById('extra-actions-{{ $user->id }}').style.display = 'block'; return false"><i class="bi bi-three-dots-vertical"></i></a>
                                                                                    <div class="extra-actions with-box-shadow white-bg" id="extra-actions-{{ $user->id }}">
                                                                                        <div class="close-row grey-bg-hover" ><a href="{{ route('admin.orders.show', $order_id = $order->id) }}" class="actions-btn-hidden no-text-deco " title="view more">Details</a> <i class="bi bi-x" role="button"  onclick="document.getElementById('extra-actions-{{ $user->id }}').style.display = 'none'"></i></div>
                                                                                        <form class="">
                                                                                            @csrf
                                                                                            <div class="row form-row">
                                                                                                <div class="col-sm-12">
                                                                                                    <div class="form-group">
                                                                                                        <input type="hidden" class="form-control" name="user_id" value="{{ $user->id }}">
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
                                                        @endif
                                                    </div>
                                                    <div class="rows pagination-row">
                                                        
                                                        <div>
                                                            <nav aria-label="Page navigation example">
                                                                <ul class="pagination justify-content-end">
                                                                    {{$orders->links()}}
                                                                </ul>
                                                                </nav>
                                                        </div>
                                                    </div>
                                                </div>
    
                                                
                                                
                                                
                                            </div>
                                            
                                        </div>


                                        <div class="grid-col-30 " >
                                            <div class="with-box-shadow white-bg rounded-edges padding-20">
                                               <div class="logged-in-user-container">
                                                    <div class="user-card">
                                                        <div><img src="{{asset('admincontent/images/avatars/avatar-1577909_1280.webp')}}" class="user-image-large rounded-edges" /></div>
                                                        <div class="name-id-container">
                                                            <h4>{{ $user->firstname }} {{ $user->lastname }}</h4>
                                                            <p>Customer ID #{{ $user->unique_id }}</p>
                                                        </div>
                                                    </div>

                                                    <div class="card-order-total-container">
                                                       <div class="card-order-total order-card">
                                                            <div class="card-order-total-icon-wrap">
                                                                <span><i class="bi bi-cart3"></i></span>
                                                            </div>

                                                            <div class="card-0-t-details">
                                                                <p >{{$user->purchases->count() }}</p>
                                                                <p>Orders</p>
                                                                
                                                            </div>

                                                       </div> 
                                                       <div class="card-order-total spent-card">
                                                            <div class="card-order-total-icon-wrap">
                                                                <span><i class="bi bi-cart3"></i></span>
                                                            </div>
                                                            <div class="card-0-t-details">
                                                                <p>₦{{number_format($user->purchases->sum('paidamount'), 2)  }}</p>
                                                                <p>Spent</p>
                                                            </div>

                                                       </div>
                                                    </div>
                                               </div>
                                                <div class="user-more mt-20 mt-20-sm">
                                                    <div><h4>User Details</h4></div>
                                                    <section class="mt-20 mt-20-sm">
                                                    
                                                        <div class="user-more-details"><p><span class="user-details-header">Email:</span> <span class="user-details-light">{{$user->email }}</span></p></div>
                                                        <div class="user-more-details"><p><span class="user-details-header">Contact:</span> <span class="user-details-light">{{$user->phone }}</span></p></div>
                                                        <div class="user-more-details"><p><span class="user-details-header">Country:</span> <span class="user-details-light">
                                                            @empty($user->ownedaddress->country )

                                                            @else
                                                                {{$user->ownedaddress->country }}
                                                            @endempty
                                                            
                                                        </span></p></div>
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

        {{-- the below include contains essential javascript files --}}
        @include('layouts.adminFooter') 
    </body>
    
</html>