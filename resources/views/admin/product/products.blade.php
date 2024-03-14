<!doctype html>
<html>
    <head>
        <title>Products | Admin</title>
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
                            <div class="rows single-table-larger-table">
                                
                                    
                                <!-- recent orders: body wrap row  -->
                                <div class="recent-orders white-bg with-box-shadow">
                                    <div class="rows recent-orders-header">
                                        <div class="count-invoice">
                                            <div class="recent-orders-count">
                                                <span>10</span><i class="bi bi-chevron-down"></i>
                                            </div>
        
                                            <div class="">
                                                <a href="{{ route('admin.product.new') }}" class="create-invoice-btn darkblue-bg no-text-deco color-cream"> <i class="bi bi-plus"></i> <span>Create Product</span></a>
                                            
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

                                    @if($allproducts->count() > 0)
                                    <table class="table product-table">
                                    
                                        <thead>
                                            <tr >
                                                <td>Stock</td>
                                                <td>ID</td>
                                                <td>Product</td>
                                                <td>Category</td>
                                                <td>Price</td>
                                                <td>SKU</td>
                                                <td>QTY</td>
                                                <td>Actions</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($allproducts as $product)
                                            <tr >
                                                <td>
                                                    
                                                    @if($product->productInventory->count() > 0)
                                                        <span class="stock in-stock">In Stock</span>
                                                    @else
                                                        <span class="stock out-of-stock">Out of Stock</span>
                                                    @endif
                                                    
                                                </td>
                                                <td>
                                                    <span title="{{ $product->id }}" class="product-id-truncated">{{ $product->unique_id }}</span></td>
                                                <td>
                                                    <div class="product">
                                                        <div class="product-image-wrap">
                                                            <div class="rounded-image-wrap">
                                                                <a href="{{ asset('storage/'.$product->product_image_1) }}" target="_blank"><img src="{{ asset('storage/'.$product->product_image_1) }}" alt="{{ $product->product_name }}" class="product-image"></a>
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="d-flex flex-column">
                                                            <h6 class="product-name mb-0">{{ $product->product_name }}</h6>
                                                            <small class="product-description-small">{{ $product->productBrands->brand_name }}</small>
                                                        </div>
                                                    </div>
                                                    
                                                </td>
                                                <td>
                                                    <div class="Categories-wrap">
                                                        @foreach($product->productCategories as $prodCat)
                                                        <p class="Category-names mb-0" title="{{ $prodCat->category_name }}">{{ $prodCat->category_name }}</p>
                                
                                                        @endforeach
                                                        
                                                        
                                                    </div>
                                                </td>
                                                <td class="grey-text" style="color: #6f6b7d;"><span>₦{{ number_format($product->product_price) }}</span> </td>
                                                <td class="grey-text"><span>{{ Str::upper($product->product_sku) }}</span> </td>
                                                <td class="grey-text"> <span>{{ $product->productInventory->stock_quantity }}</span></td>
                                                <td>
                                                    <div class="actions-td">
                                                        <a href="{{ route('admin.product.edit', $product_id = $product->id) }}" class="actions-btn grey-text no-text-deco" title="edit product"><i class="bi bi-pen"></i></a>
                                                        <a href="{{ route('store.products.view', $product_id = $product->id) }}" class="actions-btng grey-text no-text-deco" title="view more"><i class="bi bi-eye"></i></a>
                                                        <a  role="button" class="actions-btn grey-text no-text-deco" title="more actions" onclick="document.getElementById('extra-actions').style.display = 'block'; return false"><i class="bi bi-three-dots-vertical"></i></a>
                                                        <div class="extra-actions with-box-shadow white-bg" id="extra-actions">
                                                            <div class="close-row grey-bg-hover" ><a href="{{ route('store.products.view', $product_id = $product->id) }}" class="actions-btn-hidden no-text-deco " title="view more">Details</a> <i class="bi bi-x" role="button"  onclick="document.getElementById('extra-actions').style.display = 'none'"></i></div>
                                                            <div><a href="{{ route('admin.product.edit', $product_id = $product->id) }}" class="actions-btn-hidden no-text-deco grey-bg-hover" title="view more">Edit</a></div>
                                                            <form class="" method="post" action="{{ route('admin.product.delete') }}">
                                                                @method('delete')
                                                                @csrf
                                                                <div class="row form-row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <input type="hidden" class="form-control" name="product_id" value="{{ $product->id }}">
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
                                                    {{$allproducts->links()}}
                                                </ul>
                                                </nav>
                                        </div>
                                    </div>

                                    @else
                                                
                                            
                                    <div class="not-added-wrap">
                                        <div class="not-added-yet">
                                            <div class="notadded-icon"> <i class="bi bi-shield-check"></i></div>
                                            <h3>You have not added any products yet</h3>
                                            <p>Products will show up here as you add them, ensure to add pproducts 
                                                as customers often search products by product name. </p>


                                            <div class="not-added-add-now">
                                                <a href="{{ route('admin.product.new') }}">Add Product</a>
                                            </div>
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

         {{-- the below include contains essential javascript files --}}
         @include('layouts.adminFooter') 
    </body>
    
</html>