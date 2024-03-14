<div class="menu-wrapper " id="menu_wrapper">
                        
    <div class="menu_drop_down">
        <ul class="">
            <div class="menu-close-wrap lg-nodisplay">
                <div>&nbsp;</div>
                <div class="close-menu" id="menu-close-button" ><i class="bi bi-x"></i></div>
            </div>
            
            <!--  people -->
            <li class="content-description">People</li>
                @if(Auth::guard('admin')->user()->isSuperAdmin == 1)
           
                <li class="menu-li-item"><a href="#" onclick="showMenuChild('child-list-admin'); return false;" role="button"> <i class="bi bi-people"></i><span>Admins</span> <i class="bi bi-chevron-right"></i></a></li>
                <section  class="child-list" id="child-list-admin" >
                    <li class="menu-li-item content" ><a href="{{ route('admin.admins') }}"> <i class="bi bi-person-lines-fill"></i><span>Admin List</span></a></li>

                </section>
                @endif

            
                <li class="menu-li-item"><a href="#" onclick="showMenuChild('child-list-user'); return false;" role="button"> <i class="bi bi-person-circle"></i><span>Users</span> <i class="bi bi-chevron-right" id="carret-opener"></i></a></li>
                <section class="child-list" id="child-list-user">
                    <li class="menu-li-item content" ><a href="/admin/users"> <i class="bi bi-person-lines-fill"></i><span>Users List</span></a></li>
                    
                </section>
            
            <!-- end of people -->

            <!-- Store Inventory -->

            <li class="content-description">Store Inventory</li>
            
                <li class="menu-li-item"><a href="#" onclick="showMenuChild('child-list-brand'); return false;" role="button"> <i class="bi bi-shield-check"></i><span>Brands</span> <i class="bi bi-chevron-right"></i></a></li>
                <section class="child-list" id="child-list-brand">
                    <li class="menu-li-item content" ><a href="/admin/brands"> <i class="bi bi-list"></i><span>Brand List</span></a></li>
                    <li class="menu-li-item content" ><a href="/admin/brands/new"> <i class="bi bi-plus"></i><span>Add Brand</span></a></li>
                    

                </section>

            
            <li class="menu-li-item"><a href="#" onclick="showMenuChild('child-list-category'); return false;" role="button"> <i class="bi bi-boxes"></i><span>Categories</span> <i class="bi bi-chevron-right"></i></a></li>
                <section  class="child-list" id="child-list-category">
                    <li class="menu-li-item content" ><a href="/admin/categories"> <i class="bi bi-list"></i><span>Category List</span></a></li>
                    <li class="menu-li-item content" ><a href="/admin/categories/new"> <i class="bi bi-plus"></i><span>Add Category</span></a></li>
                    
                </section>

            
            <li class="menu-li-item"><a href="#" onclick="showMenuChild('child-list-product'); return false;" role="button"> <i class="bi bi-box-seam"></i><span>Products</span> <i class="bi bi-chevron-right"></i></a></li>
                <section class="child-list" id="child-list-product">
                    <li class="menu-li-item content"  ><a href="/admin/products"> <i class="bi bi-list"></i><span>Product List</span> </a></li>
                    <li class="menu-li-item content"  ><a href="/admin/products/new"> <i class="bi bi-plus"></i><span>Add Product</span> </a></li>
                    
                </section>
            <!-- end of Store Inventory -->

            <!-- Sales & Coupons-->
            <li class="content-description">Sales & Coupons</li>
            
                <li class="menu-li-item"><a href="#" onclick="showMenuChild('child-list-order'); return false;" role="button"> <i class="bi bi-cart4"></i><span>Orders</span> <i class="bi bi-chevron-right"></i></a></li>
                <section class="child-list" id="child-list-order" >
                    <li class="menu-li-item content" ><a href="{{ route('admin.orders.display') }}"> <i class="bi bi-list"></i><span>Order List</span></a></li>
                    {{-- <li class="menu-li-item content" ><a href="{{ route('admin.orders.add') }}"> <i class="bi bi-plus"></i><span>Add Order</span></a></li> --}}
          

                </section>

            
            <li class="menu-li-item"><a href="#" onclick="showMenuChild('child-list-purchase'); return false;" role="button"> <i class="bi bi-cart-check"></i><span>Purchases</span> <i class="bi bi-chevron-right"></i></a></li>
                <section class="child-list" id="child-list-purchase">
                    <li class="menu-li-item content" ><a href="{{ route('admin.purchase.display') }}"> <i class="bi bi-list"></i><span>Purchase List</span></a></li>
                </section>

            
                <li class="menu-li-item"><a href="#" onclick="showMenuChild('child-list-coupon'); return false;" role="button"> <i class="bi bi-percent"></i><span>Coupons</span> <i class="bi bi-chevron-right"></i></a></li>
                <section class="child-list" id="child-list-coupon">
                    <li class="menu-li-item content"  ><a href="{{ route('admin.coupons') }}"> <i class="bi bi-list"></i><span>Coupon List</span> </a></li>
                    <li class="menu-li-item content"  ><a href="{{ route('admin.coupon.new') }}"> <i class="bi bi-plus"></i><span>Add Coupon</span> </a></li>
                    {{-- <li class="menu-li-item content"  ><a href="#"> <i class="bi bi-pen"></i><span>Update Coupon</span> </a></li> --}}
                </section>

                <li class="menu-li-item"><a href="#" onclick="showMenuChild('child-list-discount'); return false;" role="button"> <i class="bi bi-percent"></i><span>Discount Sales</span> <i class="bi bi-chevron-right"></i></a></li>
                <section class="child-list" id="child-list-discount">
                    <li class="menu-li-item content"  ><a href="{{ route('admin.discount') }}"> <i class="bi bi-list"></i><span>Discount Sales</span> </a></li>
                    <li class="menu-li-item content"  ><a href="{{ route('admin.discount.new') }}"> <i class="bi bi-plus"></i><span>Discount Sales</span> </a></li>
                    {{-- <li class="menu-li-item content"  ><a href="#"> <i class="bi bi-pen"></i><span>Update Coupon</span> </a></li> --}}
                </section>
            <!-- end of Sales & Coupons-->
            
            <!-- Store Front-->
            @if(Auth::guard('admin')->user()->isSuperAdmin == 1)
                <li class="content-description">Store Front</li>

            
                <li class="menu-li-item"><a href="#" onclick="showMenuChild('child-list-store-section'); return false;" role="button"> <i class="bi bi-tags"></i><span>Store Section</span> <i class="bi bi-chevron-right"></i></a></li>
                <section class="child-list" id="child-list-store-section">
                    <li class="menu-li-item content" ><a href="#"> <i class="bi bi-list"></i><span>Section List</span></a></li>
                    <li class="menu-li-item content" ><a href="#"> <i class="bi bi-plus"></i><span>Add Section</span></a></li>
                    <li class="menu-li-item content" ><a href="#"> <i class="bi bi-pen"></i><span>Edit Section</span></a></li>

                </section>

            
                <li class="menu-li-item"><a href="{{ route('admin.store-banner') }}"  role="button"> <i class="bi bi-flag"></i><span>Store Banner</span> <i class="bi bi-chevron-right"></i></a></li>
                

            
                <li class="menu-li-item"><a href="#" onclick="showMenuChild('child-list-advert'); return false;" role="button"> <i class="bi bi-badge-ad"></i><span>Advert Banner</span> <i class="bi bi-chevron-right"></i></a></li>
                <section class="child-list" id="child-list-advert">
                    <li class="menu-li-item content"  ><a href="{{ route('admin.advert-banner') }}"> <i class="bi bi-list"></i><span>Advert List</span> </a></li>
                    <li class="menu-li-item content"  ><a href="{{ route('admin.advert-banner.new') }}"> <i class="bi bi-plus"></i><span>Add Advert</span> </a></li>
                    {{-- <li class="menu-li-item content"  ><a href="#"> <i class="bi bi-box-seam"></i><span>Update Advert</span> </a></li> --}}
                </section>

            
                <li class="menu-li-item"><a href="{{ route('admin.logo') }}" role="button"> <i class="bi bi-person-badge"></i><span>Logo</span> <i class="bi bi-chevron-right"></i></a></li>
                <section class="child-list" >
                    <li class="menu-li-item content"  ><a href="{{ route('admin.logo') }}"> <i class="bi bi-box-seam"></i><span>View Logo</span> </a></li>
                    <li class="menu-li-item content"  ><a href="#"> <i class="bi bi-plus"></i><span>Add Logo</span> </a></li>
                    <li class="menu-li-item content"  ><a href="#"> <i class="bi bi-box-seam"></i><span></span> </a></li>
                </section>
            <!-- end of Store Front-->
            @endif
            <!-- Sales & Coupons-->
            <li class="content-description">Analytics</li>

            <li class="menu-li-item"><a href="{{ route('admin.profile') }}" role="button"> <i class="bi bi-person-circle"></i><span>Profile</span></a></li>
               
            <li class="menu-li-item">
                <form method="post" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" ><i class="bi bi-box-arrow-right"></i><span>Logout</span> </button>
                </form>
                
                
               
          
                
            <!-- end of Sales & Coupons-->
        </ul>

    </div>

    
</div>