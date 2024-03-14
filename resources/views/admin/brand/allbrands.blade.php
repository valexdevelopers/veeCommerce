<!doctype html>
<html>
    <head>
        <title>Brands | Admin</title>
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
                                
                                 @if(Session::has('message')) 
                                    <div class="alert {{ Session::get('message-color') }} alert-dismissible fade show" role="alert">
                                        <strong>{{ Session::get('message') }}</strong> 
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                 @endif
                                <!-- recent orders: body wrap row  -->
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
                                            <form method="post" > 

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
                                    @if($allBrands->count() > 0)
                                    <table class="table product-table">
                                    
                                        <thead>
                                            <tr >
                                                <td><input type="checkbox" class="" size="4" name="selected-row"></td>
                                                <td>ID</td>
                                                <td>Brand</td>
                                                <td>Products</td>
                                                <td>Categories</td>
                                                <td>Actions</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($allBrands as $brand)
                                            <tr >
                                               <td><input type="checkbox" class="" size="4" name="selected-row"></td>
                                                <td>
                                                    <span style="color:#196ba1;" title="{{$brand->id }}" class="product-id-truncated">#{{$brand->unique_id }}</span></td>
                                                <td>
                                                    <div class="product">
                                                        <div class="product-image-wrap">
                                                            <div class="product-avatar rounded-image-wrap">
                                                                <a href="{{asset('storage/'.$brand->brand_image) }}" target="_blank"><img src="{{asset('storage/'.$brand->brand_image) }}" alt="{{ $brand->brand_name }}" class="product-image"></a>
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="d-flex flex-column">
                                                            <h6 class="product-name mb-0">{{ $brand->brand_name }}</h6>
                                                            {{-- products under this brand get their categories --}}
                                                            <small class="product-description-small">Phones, Wristwatches, Ipads, Laptops amd Desktops</small>
                                                        </div>
                                                    </div>
                                                    
                                                </td>
                                                
                                                <td class="grey-text"><span>212</span> </td>
                                               
                                                <td class="grey-text"> <span>123</span></td>
                                                <td>
                                                    <div class="actions-td">
                                                        <a href="{{ route('admin.brand.edit', $brand_id = $brand->id) }}" class="actions-btn grey-text no-text-deco" title="Edit {{ $brand->brand_name }}"><i class="bi bi-pen"></i></a>
                                                        <a href="/brands/{{ $brand->brand_name }}" class="actions-btng grey-text no-text-deco" title="view more"><i class="bi bi-eye"></i></a>
                                                        <a  role="button" class="actions-btn grey-text no-text-deco" title="More Actions" onclick="document.getElementById('extra-actions-{{ $brand->brand_name }}').style.display = 'block'; return false"><i class="bi bi-three-dots-vertical"></i></a>
                                                        <div class="extra-actions with-box-shadow white-bg" id="extra-actions-{{ $brand->brand_name }}">
                                                            <div class="close-row grey-bg-hover" ><a href="/brands/{{ $brand->brand_name }}" class="actions-btn-hidden no-text-deco " title="view more">Details</a> <i class="bi bi-x" role="button"  onclick="document.getElementById('extra-actions-{{ $brand->brand_name }}').style.display = 'none'"></i></div>
                                                            <div><a href="{{ route('admin.brand.edit', $brand_id = $brand->id) }}" class="actions-btn-hidden no-text-deco grey-bg-hover" title="view more">Edit</a></div>
                                                            <form class="" method="post" action="{{ route('admin.brand.delete') }}">
                                                                @method('delete')
                                                                @csrf
                                                                <div class="row form-row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <input type="hidden" class="form-control" name="brand_id" value="{{ $brand->id }}">
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
                                    @else
                                                
                                            
                                    <div class="not-added-wrap">
                                        <div class="not-added-yet">
                                            <div class="notadded-icon"> <i class="bi bi-shield-check"></i></div>
                                            <h3>You have not added any brands yet</h3>
                                            <p>Brands will show up here as you add them, ensure to add product brands 
                                                as customers often search products by brand name. </p>


                                            <div class="not-added-add-now">
                                                <a href="brands/new">Add Brand</a>
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

        @include('layouts.adminFooter')
    </body>
    
</html>