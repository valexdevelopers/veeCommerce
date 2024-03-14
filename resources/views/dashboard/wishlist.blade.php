<!DOCTYPE html> 
<html>
    <head>
        <title>Wishlist | Vee Commerce </title>
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
                                <li class="d-links "><a href="{{ route('auth.user.show') }}"  > <i class="bi bi-house-door"></i> Dashboard</a></li>
                                <li class="d-links"><a href="{{ route('auth.user.orders') }}" ><i class="bi bi-bag"></i> My Orders</a></li>
                                
                                <li class="d-links"><a href="{{ route('auth.user.address') }}" ><i class="bi bi-house"></i>  Addresses</a></li> 
                                <li class="d-links active"><a href="{{ route('auth.user.wishlist') }}" class="active-link"> <i class="bi bi-heart"></i> Wishlist</a></li>
                                
                                <li class="d-links"><a href="{{ route('auth.user.profile') }}" > <i class="bi bi-person"></i> Manage Profile</a></li>
                                <li class="d-links"><a href="{{ route('auth.user.showlogoutform') }}" > <i class="bi bi-box-arrow-right"></i> Logout</a></li>
                            </ul>
                        </div>
                        <div class="otherinfo">
                            <div class="dashboard-intro">
                                <h1>Wishlist</h1>
                                <p ></p>
                               
                            </div>
                            <div>
                                @if($userWishlist->count() > 0)
                                    <div class="wish-set" >
                                        @foreach($userWishlist as $wishproduct)
                                            <div class="wishlist">
                                                
                                                <div class="wish-product-image">
                                                    <img src="{{asset('storage/'.$wishproduct->wishlistProducts->product_image_1) }}" />
                                                </div>
                                                <div class="wish-price-wrap">
                                                    <h5 class="thick single-product-description">{{ $wishproduct->wishlistProducts->product_name }} - {{ $wishproduct->wishlistProducts->productBrands->brand_name }}</h5>
                                                    <p>
                                                        @empty($wishproduct->wishlistProducts->product_discount_price)
                                                            <span class="thick">₦{{ number_format($wishproduct->wishlistProducts->product_price, 2) }}</span>&nbsp;
                                                        @else
                                                            <span class="thick">₦{{ number_format($wishproduct->wishlistProducts->product_discount_price) }}</span>&nbsp;
                                                            
                                                        @endempty
                                                        
                                                        @if($wishproduct->wishlistProducts->productInventory->stock_quantity > 0)
                                                            <sup class="stock in-stock">In Stock</sup> 
                                                        @else
                                                            <sup class="stock out-of-stock">In Stock</sup> 
                                                        @endif

                                                        &nbsp; &nbsp;  

                                                        @empty($wishproduct->wishlistProducts->product_discount_price)

                                                        @else
                                                            <s>₦{{ number_format($wishproduct->wishlistProducts->product_price) }}</s>
                                                        @endempty
                                                    </p>
                                                    
                                                    @empty($wishproduct->color)
                                                    

                                                    @else
                                                        <p class="wishlist-variants">
                                                            <span>Color:</span> <span>{{ $wishproduct->color }}</span>
                                                        </p>

                                                    @endempty

                                                    {{-- @empty($wishproduct->size)
                                                    

                                                    @else
                                                        <p class="wishlist-variants">
                                                            <span>Size:</span> <span>{{ $wishproduct->size }}</span>
                                                        </p>

                                                    @endempty --}}

                                                    
                                                    
                                                    <div class="">

                                                        <form method="post" action="{{ route('auth.user.profile.update') }}">
                                                            @csrf
                                                            <div class="sm-grid row form-row">
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <a style="color:red; border: 1px solid red;" href="{{ route('auth.user.wishlist.delete', $product_id = $wishproduct->id) }}" class="btn " type="submit" ><i class="bi-trash"></i>  Remove</a>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <input  type="hidden" name="product_id" value="{{ $wishproduct->wishlistProducts->id }}">
                                                                    <input  type="hidden" name="product_price" value="{{ $wishproduct->wishlistProducts->product_price }}">
                                                                    <input  type="hidden" name="product_size" value="{{ $wishproduct->size }}">
                                                                    <input  type="hidden" name="product_color" value="{{ $wishproduct->color }}">
                                                                    <div class="form-group">
                                                                        @if($wishproduct->wishlistProducts->productInventory->stock_quantity > 0)
                                                                            <button style="color: rgb(0, 174, 255); border: 1px solid rgb(0, 174, 255)" class="btn " type="submit" ><i class="bi-cart4"></i> Move to cart</button>
                                                                        @else
                                                                            <button disabled style="color: rgb(0, 174, 255); border: 1px solid rgb(0, 174, 255);  opacity: 0.6; pointer-events: none;" class="btn"  ><i class="bi-cart4"></i> Move to cart</button>
                                                                        @endif
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                        </form>
                                                        
                                                    </div>
                                                
                                                </div>
                                            </div> 
                                        @endforeach
                                        
                                        
                                        
                                    </div>
                                @else 
                              
                                    <div class="empty-order">
                                            
                                        <span class="product-no">
                                            <i></i>
                                            You have not added anything to your wishlist yet
                                        </span>
                                    
                                    
                                        <a href="{{ route('home') }}" class="browse-btn" role="button"> Browse Products</a>
                                    
                                    </div>
    
                                @endif
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