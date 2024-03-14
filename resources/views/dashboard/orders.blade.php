<!DOCTYPE html> 
<html>
    <head>
        <title>My Orders | Vee Commerce </title>
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
                                <ul>
                                    <li class="d-links "><a href="{{ route('auth.user.show') }}"  > <i class="bi bi-house-door"></i> Dashboard</a></li>
                                    <li class="d-links active"><a href="{{ route('auth.user.orders') }}" class="active-link"><i class="bi bi-bag"></i> My Orders</a></li>
                                    
                                    <li class="d-links"><a href="{{ route('auth.user.address') }}" ><i class="bi bi-house"></i>  Addresses</a></li> 
                                    <li class="d-links"><a href="{{ route('auth.user.wishlist') }}" > <i class="bi bi-heart"></i> Wishlist</a></li>
                                    
                                    <li class="d-links"><a href="{{ route('auth.user.profile') }}" > <i class="bi bi-person"></i> Manage Profile</a></li>
                                    <li class="d-links"><a href="{{ route('auth.user.showlogoutform') }}" > <i class="bi bi-box-arrow-right"></i> Logout</a></li>
                                </ul>
                            </ul>
                        </div>
                        <div class="otherinfo">
                            <div class="dashboard-intro">
                                <h1>My Orders</h1>
                                <p ></p>
                               
                            </div>
                            @if($orders->count() == 0)
                                <div class="empty-order">
                                        
                                    <span class="product-no">
                                        <i></i>
                                        No order has been made yet.
                                    </span>
                                
                                
                                    <a href="#" class="browse-btn" role="button"> Browse Products</a>
                                
                                </div>

                            @else
                                <table class="table product-table">
                                        
                                    <thead>
                                        <tr >
                                            <td><input type="checkbox" class="" size="4" name="selected-row"></td>
                                            <td>ID</td>
                                            <td>STATUS</td>
                                            <td>DATE</td>
                                            <td>TOTAL</td>

                                            <td>Details</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $order)
                                            <tr >
                                                <td><input type="checkbox" class="" size="4" name="selected-row"></td>
                                                <td>
                                                    <span title="{{ $order->id }}" style="color:#0fc49d;">{{ $order->id }}</span></td>
                                                <td><span role="button" class="yellow-circle" title="pending payment">{{ $order->order_status }}</span></td>
                                                
                                                <td class="grey-text" style="color: #6f6b7d;"><span>{{ $order->created_at->format('l jS \of F Y') }}</span> </td>
                                                <td class="grey-text" style="color: #6f6b7d;"><span>₦{{ number_format($order->total, 2) }}</span> </td>
                                                
                                               
                                                <td class="grey-text"> <span><a href="{{ route('auth.user.orders.show', $order_id = $order->id) }}" class="actions-btng grey-text no-text-deco" title="view details"><i class="bi bi-eye"></i></a></span></td>
                                                
                                            </tr>  
                                        @endforeach
                                        
                                    </tbody>
                                </table> 
                            
                                <div class="rows pagination-row">
                                        
                                        <div>
                                            <nav aria-label="Page navigation example">
                                                <ul class="pagination justify-content-end">
                                                    {{ $orders->links() }}
                                                </ul>
                                                </nav>
                                        </div>
                                    </div>
                            @endempty
                            
                            
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