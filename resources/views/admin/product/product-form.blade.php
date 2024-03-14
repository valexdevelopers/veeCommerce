<!doctype html>
<html>
    <head>
        <title>New Product | Admin</title>
        @include('layouts.adminHeadContent')
       </head>
    <style>
        
    </style>
    <body >
        <!--classes are named to get precedence over bootstrap modal -->
        
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
                                            <h6 class="">New Product </h6>
                                            
                                        </div>
                                        
                                       <small class="order-extra-details">Add new products here</small>
                                    </div>
                                    <div class="delete-order-container">
                                        <div><a href="{{ route('admin.products') }}" class="red-bg color-red button-1 no-text-deco">View Products</a></div>
                                    </div>
                                </div>
                                <div class="padding-5">
                                    <form method="post" action="{{ route('admin.product.create') }}" enctype="multipart/form-data">
                                        @csrf
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
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
                                        <div class="lg-grid-70-30 ">
                                            <div class=" grid-col-70 ">
                                                <div class="with-box-shadow white-bg rounded-edges padding-20">
                                                    <div class=""><h6 class="product-name">Product Information</h6></div>
                                                    <div class="row form-row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Product Name</label>
                                                                <input value="{{ old('product_name') }}" type="text" class="form-control appearance-text-field @error('product_name') is-invalid @enderror" required name="product_name" placeholder="Product Name">
                                                                @error('product_name')
                                                                    <div class="help-block form-text with-errors form-control-feedback">{{$message}}</div>
                                                                 @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row form-row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Description (optional)</label>
                                                                <textarea name="product_description" class="form-control" id="exampleFormControlTextarea1" rows="6" placeholder="Product description"></textarea>
                                                                @error('product_description')
                                                                    <div class="help-block form-text with-errors form-control-feedback">{{$message}}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="image_preview_wrap" class="image_preview_wrap">
                                                    <div class="image-preview-container white-bg with-box-shadow" id="image-preview-container">
                                                        <div class="image-preview">
                                                            <img class="setImagePreview" id="banner1" />
                                                        </div>
                                                        <div class="preview-image-details">
                                                            <p class="preview-image-name">image-name.jpg</p>
                                                            <p class="preview-image-size">1.3KB</p>
                                                           
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                    
                                                </div>
                                                <div class="product-image-dropzone mt-20 mt-20-sm mt-20 mt-20-sm with-box-shadow white-bg rounded-edges padding-20">
                                                    <div><h6 class="product-name">Product Images</h6></div>
                                                    <div class="file-upload-wrapper">
                                                        <div  class="upload-info">
                                                            <p ><i class="bi bi-cloud-upload"></i></p>
                                                            <p class="drag-drop">drag and drop up to 5 images here</p>
                                                            <p class="drag-drop">Click and hold control for multiple selection</p>
                                                            <button class="upload-product-images">click to upload</button>
                                                        </div>
                                                        
                                                        <input required name="product_images[]" accept="image/*" type="file" id="banner-images-input" class="product-image-upload file-upload @error('product_images') is-invalid @enderror" data-height="500" multiple/>
                                                        @error('product_images')
                                                            <div class="help-block form-text with-errors form-control-feedback">{{$message}}</div>
                                                        @enderror
                                                     </div>
                                                </div>
                                                <div  class=" mt-20 mt-20-sm mt-20 mt-20-sm with-box-shadow white-bg rounded-edges padding-20">
                                                    <div><h6 class="product-name">Product Variant</h6></div>
                                                    <section id="product-variant">
                                                        <section id="options-for-product-details-1" class="product-variant-class">
                                                            <div class="row form-row" >
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label class="form-label">Options</label>
                                                                        <select class="select_variant form-select"  id="select_variant_1" name="product_select_variant"  >
                                                                            <option value="" disabled selected>Choose Options</option>
                                                                            <option value="size">Size</option>
                                                                            <option value="weigth">Weigth</option>
                                                                            <option value="color">Color</option>
                                                                            <option value="dimension">Dimension</option>
                                                                            
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label role="button" class="form-label" >&nbsp;<i id="remove-product-variant-1" class="bi bi-dash remove-product-variant-value" style="color: brown;" title="dbl Click to remove"></i></label>
                                                                        <input type="text" id="variant_1" class="input_variant form-control appearance-text-field" placeholder="Variant Value" >
                                                                    </div>
                                                                </div>
                                                            </div>
    
                                                            <section id="product-variant-child" style="display: none;" class="product-variant-child">
                                                                <div class="product-variant-child-div-child row form-row" id="options-values-for-product-details">
                                                                    
                                                                    <div class="variant-value-group col-sm-6 col-md-4 col-lg-3" id="option-value-1">
                                                                        <div class="form-group">
                                                                            <label class="form-label" id="label-option-value" style="text-transform: capitalize;">Value</label>
                                                                            <div class="input-group ">
                                                                                <input id="option-value" type="text" class="option-value form-control search-input" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                                                                                <button class="remove-product-variant white-bg color-cream" type="button" id="button-addon1">
                                                                                    <i id="remove-product-variant-option-value-1" class="bi bi-dash remove-product-variant-value remove-product-variant-option-value" style="color: brown;"></i>
                                                                                </button>
                                                                            </div>   
                                                                        </div>   
                                                                    </div>
                                                                    
                                                                    
                                                                </div>
                                                                <div class="row form-row">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                          <button type="button" role="button" class="create-option-value-btn add-option lightblue-bg rounded-edges" id="create-option-value-btn" style="text-transform: capitalize;">Add Option Value</button>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </div>
                                                            </section>
                                                        </section>
                                                        
                                                        
                                                    </section>
                                                    
                                                    <div class="row form-row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                              <button type="button" role="button" class="add-option lightblue-bg rounded-edges" id="create-option-btn">Add another Option</button>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                
                                            </div>


                                            <div class="grid-col-30 mt-20-sm" >
                                                <div class="with-box-shadow white-bg rounded-edges padding-20">
                                                    <div ><h6 class="product-name">Pricing</h6></div>
                                                    <div class="row form-row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Base Price</label>
                                                                <input value="{{ old('product_price') }}"  type="number" class="form-control appearance-text-field @error('product_price') is-invalid @enderror" required name="product_price" placeholder="Base Price">
                                                                @error('product_price')
                                                                    <div class="help-block form-text with-errors form-control-feedback">{{$message}}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Discounted Price</label>
                                                                <input value="{{ old('product_discount_price') }}" type="number" class="form-control appearance-text-field @error('product_discount_price') is-invalid @enderror" name="product_discount_price" placeholder="Leave empty if no discount">
                                                                @error('product_discount_price')
                                                                    <div class="help-block form-text with-errors form-control-feedback">{{$message}}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class=" mt-20 mt-20-sm  with-box-shadow white-bg rounded-edges padding-20">
                                                    <div><h6 class="product-name">Organise</h6></div>
                                                    <div class="row form-row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label flexed-label" ><span class="flexed-label-span">Brand</span> <a href="{{ route('admin.brand.new') }}" class="flexed-label-anchor">New Brand</a></label>
                                                                <select class="form-select"  id="country" name="product_brand" required>
                                                                    
                                                                    @if($brands->count() > 0)
                                                                        <option value="" disabled selected>Select Product Brand</option>
                                                                        @foreach($brands as $brand)
                                                                            <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                                                        @endforeach
                                                                        
                                                                        
                                                                    @else
                                                                        <option value=""  disabled selected>You have not added any brands yet</option>
                                                                    @endif
                                                                    
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                @include('layouts.productCategoriesSelection')
                                                                <label class="form-label flexed-label" ><span class="flexed-label-span">Category</span> <a href="{{ route('admin.category.new') }}" class="flexed-label-anchor">New Category</a></label>
                                                                <select class="form-select"  id="country" name="product_category"  >
                                                                    <option value="" id="selectProductCategorybtn" >Select Product Category</option>
                                                                    
                                                                    
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="row form-row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Collection</label>
                                                                <input type="text" class="form-control appearance-text-field @error('') is-invalid @enderror" required name="product_" placeholder="Collection">
                                                            </div>
                                                        </div>
                                                    </div> --}}
                                                    <div class="row form-row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Status</label>
                                                                <select class="form-select"  id="country" name="country" required>
                                                                    <option value="">Select Product Status</option>
                                                                    <option value="active">Show Product</option>
                                                                    <option value="inactive">Hide Product</option>
                                                                    
                                                                    
                                                                </select>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="mt-20 mt-20-sm with-box-shadow white-bg rounded-edges padding-20">
                                                    <div ><h6 class="product-name">Inventory</h6></div>
                                                    <div class="row form-row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Add to Stock</label>
                                                                <input value="{{ old('product_inventory') }}"  type="number" class="form-control appearance-text-field @error('product_inventory') is-invalid @enderror" required name="product_inventory" placeholder="Product Stock">
                                                                @error('product_inventory')
                                                                    <div class="help-block form-text with-errors form-control-feedback">{{$message}}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                               <button type="submit" class="btn btn-primary green-bg color-green button-2">Click to Proceed</button>
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

        {{-- the below include contains essential javascript files --}}
        @include('layouts.adminFooter') 
    </body>
    
</html>