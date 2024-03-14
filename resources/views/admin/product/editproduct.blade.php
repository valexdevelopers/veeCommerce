<!doctype html>
<html>
    <head>
        <title>Edit {{ $product->product_name }} | Admin</title>
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
                                            <h6 class=""> {{ $product->product_name }}</h6>
                                            
                                        </div>
                                        
                                       <small class="order-extra-details">Edit products here</small>
                                    </div>
                                    <div class="delete-order-container">
                                        <div><a href="{{ route('admin.products') }}" class="red-bg color-red button-1 no-text-deco">View Products</a></div>
                                    </div>
                                </div>

                                <div class="padding-5">
                                    {{-- <form method="post" action="{{ route('admin.product.patch') }}" enctype="multipart/form-data"> --}}
                                        
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

                                        <div>
                                            <div class="product-images-edits-container">

                                                <div class="advert-banner with-box-shadow">
                                                    <div class="product-container-for-images">
                                                        <div class="edit-product-images"><img src="{{asset('storage/'.$product->product_image_1) }}"></div>
                                                        
                                                    </div>
                                                    <div class="advert-details-row">
                                                        <div class="row-details">
                                                            <p><a id="edit_product_image_1" href="#image_upload" class="advert-btn small-text no-text-deco  color-green " style=""><i class="bi bi-pen"></i>&nbsp;&nbsp;Change Image</a></p>
                                                        </div>
                                                    </div>
                                                </div>

                                                @empty($product->product_image_2)
                                                    <div class="advert-banner with-box-shadow">
                                                        <div class="">
                                                            <div class="edit-product-images"><img src="{{asset('content/uploads/products/no-product-image.webp') }}"></div>
                                                            
                                                        </div>
                                                        <div class="advert-details-row">
                                                            <div class="row-details">
                                                                <p><a id="edit_product_image_2" href="#image_upload" class="advert-btn small-text no-text-deco  color-green " style=""><i class="bi bi-plus"></i>&nbsp;&nbsp;Add Image</a></p>
                                                            </div>
                                                            <div class="row-details move-to-grid-end">
                                                                
                                                                <p><a ></a></p>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="advert-banner with-box-shadow">
                                                        <div class="">
                                                            <div class="edit-product-images"><img src="{{asset('storage/'.$product->product_image_2) }}"></div>
                                                            
                                                        </div>
                                                        <div class="advert-details-row">
                                                            <div class="row-details">
                                                                <p><a id="edit_product_image_2" href="#image_upload" class="advert-btn small-text no-text-deco  color-green " style=""><i class="bi bi-pen"></i>&nbsp;&nbsp;Change Image</a></p>
                                                            </div>
                                                            <div class="row-details move-to-grid-end">
                                                                
                                                                <form method="post" action="{{ route('admin.product.remove_image') }}">
                                                                    @method('patch')
                                                                    @csrf
                                                                    <input type="hidden" value="{{ $product->id }}" name="product_id">
                                                                    <input type="hidden" value="product_image_2" name="image_location">
                                                                    <input type="hidden" value="{{ $product->product_image_2 }}" name="product_image">
                                                                    <p><button type="submit" class="advert-btn " style="color: red"><i class="bi bi-trash" ></i>&nbsp;&nbsp;Remove Image</button></p>
                                                                </form>
                                                                
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                @endempty


                                                @empty($product->product_image_3)
                                                    <div class="advert-banner with-box-shadow">
                                                        <div class="">
                                                            <div class="edit-product-images"><img src="{{asset('content/uploads/products/no-product-image.webp') }}"></div>
                                                            
                                                        </div>
                                                        <div class="advert-details-row">
                                                            <div class="row-details">
                                                                <p><a id="edit_product_image_3" href="#image_upload" class="advert-btn small-text no-text-deco  color-green " style=""><i class="bi bi-plus"></i>&nbsp;&nbsp;Add Image</a></p>
                                                            </div>
                                                            <div class="row-details move-to-grid-end">
                                                                
                                                                <p><a ></a></p>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="advert-banner with-box-shadow">
                                                        <div class="">
                                                            <div class="edit-product-images"><img src="{{asset('storage/'.$product->product_image_3) }}"></div>
                                                            
                                                        </div>
                                                        <div class="advert-details-row">
                                                            <div class="row-details">
                                                                <p><a id="edit_product_image_3" href="#image_upload" class="advert-btn small-text no-text-deco  color-green " style=""><i class="bi bi-pen"></i>&nbsp;&nbsp;Change Image</a></p>
                                                            </div>
                                                            <div class="row-details move-to-grid-end">
                                                                <form method="post" action="{{ route('admin.product.remove_image') }}">
                                                                    @method('patch')
                                                                    @csrf
                                                                    <input type="hidden" value="{{ $product->id }}" name="product_id">
                                                                    <input type="hidden" value="product_image_3" name="image_location">
                                                                    <input type="hidden" value="{{ $product->product_image_3 }}" name="product_image">
                                                                    <p><button type="submit" class="advert-btn " style="color: red"><i class="bi bi-trash" ></i>&nbsp;&nbsp;Remove Image</button></p>
                                                                </form>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                @endempty


                                                @empty($product->product_image_4)
                                                    <div class="advert-banner with-box-shadow">
                                                        <div class="">
                                                            <div class="edit-product-images"><img src="{{asset('content/uploads/products/no-product-image.webp') }}"></div>
                                                            
                                                        </div>
                                                        <div class="advert-details-row">
                                                            <div class="row-details">
                                                                <p><a id="edit_product_image_4" href="#image_upload" class="advert-btn small-text no-text-deco  color-green " style=""><i class="bi bi-plus"></i>&nbsp;&nbsp;Add Image</a></p>
                                                            </div>
                                                            <div class="row-details move-to-grid-end">
                                                                
                                                                <p><a ></a></p>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="advert-banner with-box-shadow">
                                                        <div class="">
                                                            <div class="edit-product-images"><img src="{{asset('storage/'.$product->product_image_4) }}"></div>
                                                            
                                                        </div>
                                                        <div class="advert-details-row">
                                                            <div class="row-details">
                                                                <p><a id="edit_product_image_4" href="#image_upload" class="advert-btn small-text no-text-deco  color-green " style=""><i class="bi bi-pen"></i>&nbsp;&nbsp;Change Image</a></p>
                                                            </div>
                                                            <div class="row-details move-to-grid-end">
                                                                <form method="post" action="{{ route('admin.product.remove_image') }}">
                                                                    @method('patch')
                                                                    @csrf
                                                                    <input type="hidden" value="{{ $product->id }}" name="product_id">
                                                                    <input type="hidden" value="product_image_4" name="image_location">
                                                                    <input type="hidden" value="{{ $product->product_image_4 }}" name="product_image">
                                                                    <p><button type="submit" class="advert-btn " style="color: red"><i class="bi bi-trash" ></i>&nbsp;&nbsp;Remove Image</button></p>
                                                                </form>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                @endempty


                                                @empty($product->product_image_5)
                                                    <div class="advert-banner with-box-shadow">
                                                        <div class="">
                                                            <div class="edit-product-images"><img src="{{asset('content/uploads/products/no-product-image.webp') }}"></div>
                                                            
                                                        </div>
                                                        <div class="advert-details-row">
                                                            <div class="row-details">
                                                                <p><a id="edit_product_image_5" href="#image_upload" class="advert-btn small-text no-text-deco  color-green " style=""><i class="bi bi-plus"></i>&nbsp;&nbsp;Add Image</a></p>
                                                            </div>
                                                            <div class="row-details move-to-grid-end">
                                                                
                                                                <p><a ></a></p>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="advert-banner with-box-shadow">
                                                        <div class="">
                                                            <div class="edit-product-images"><img src="{{asset('storage/'.$product->product_image_5) }}"></div>
                                                            
                                                        </div>
                                                        <div class="advert-details-row">
                                                            <div class="row-details">
                                                                <p><a id="edit_product_image_5" href="#image_upload" class="advert-btn small-text no-text-deco  color-green " style=""><i class="bi bi-pen"></i>&nbsp;&nbsp;Change Image</a></p>
                                                            </div>
                                                            <div class="row-details move-to-grid-end">
                                                                
                                                                <form method="post" action="{{ route('admin.product.remove_image') }}">
                                                                    @method('patch')
                                                                    @csrf
                                                                    <input type="hidden" value="{{ $product->id }}" name="product_id">
                                                                    <input type="hidden" value="product_image_5" name="image_location">
                                                                    <input type="hidden" value="{{ $product->product_image_5 }}" name="product_image">
                                                                    <p><button type="submit" class="advert-btn " style="color: red"><i class="bi bi-trash" ></i>&nbsp;&nbsp;Remove Image</button></p>
                                                                </form>                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                @endempty


                                            </div>


                                            <div class="product-details-container mt-20 mt-20-sm" >

                                                <div class="advert-banner with-box-shadow">
                                                    <div class="product-detail-description"><h3>Product Name</h3></div>
                                                    <div class="product-edits">
                                                        <div>
                                                            <p>{{ $product->product_name }}</p>
                                                        </div>
                                                        <div>
                                                            <a href="#product_name" id="product_name_edit" class="green-bg color-green">Edit</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="advert-banner with-box-shadow">
                                                    <div class="product-detail-description"><h3>Product Brand</h3></div>
                                                    <div class="product-edits">
                                                        <div>
                                                            <p>{{ $product->productBrands->brand_name }}</p>
                                                        </div>
                                                        <div>
                                                            <a href="#organise" id="product_brand_edit"  class="green-bg color-green">Edit</a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="advert-banner with-box-shadow">
                                                    <div class="product-detail-description"><h3>Product Description</h3></div>
                                                    <div class="product-edits">
                                                        <div>
                                                            <p>{{ json_decode($product->productDetails->about) }}</p>
                                                        </div>
                                                        <div>
                                                            <a href="#product_description" id="product_description_edit" class="green-bg color-green">Edit</a>
                                                        </div>
                                                    </div>
                                                    
                                                </div>

                                                <div class="advert-banner with-box-shadow">
                                                    <div class="product-detail-description"><h3>Product Prices</h3></div>
                                                    <div class="product-edits">
                                                        <div>
                                                            <p>Base Price: ₦{{ number_format($product->product_price) }}</p>
                                                        </div>
                                                        <div>
                                                            <a href="#product_price" id="product_price_edit" class="green-bg color-green">Edit</a>
                                                        </div>
                                                    </div>
                                                    <div class="product-edits">
                                                        <div>
                                                            <p>Discount Price: ₦{{ number_format($product->product_discount_price) }}</p>
                                                        </div>
                                                        
                                                    </div>
                                                </div>

                                                <div class="advert-banner with-box-shadow">
                                                    <div class="product-detail-description"><h3>Product Categories</h3></div>
                                                    <div class="product-edits">
                                                        <div>
                                                            <ul>
                                                                @php
                                                                   $productCategories =  $product->productCategories;
                                                                   
                                                                @endphp
                                                                @foreach($productCategories as $productCategory)
                                                                    <li>{{ $productCategory->category_name }}</li>
                                                                @endforeach
                                                                
                                                            </ul>
                                                        </div>
                                                        <div>
                                                            <a href="#product_category_container" id="product_category_edit"  class="green-bg color-green">Edit</a>
                                                        </div>
                                                    </div>
                                                    
                                                </div>

                                                
                                                <div class="advert-banner with-box-shadow">
                                                    <div class="product-detail-description"><h3>Product Colors</h3></div>
                                                    <div class="product-edits">
                                                        <div>
                                                            @empty( json_decode($product->productDetails->technical_details)->product_color)
                                                                <p>You have no product colors</p>
                                                            @else
                                                            <ul>
                                                                @php
                                                                   $productColor =  json_decode($product->productDetails->technical_details)->product_color;
                                                                   $productColor = json_decode($productColor);
                                                                @endphp
                                                                @foreach($productColor as $color)
                                                                    <li>{{ $color }}</li>
                                                                @endforeach
                                                                
                                                            </ul>
                                                            @endempty
                                                        </div>
                                                        <div>
                                                            
                                                            <a href="#variant_container" id="product_variant_edit"  class="green-bg color-green">Edit</a>
                                                            
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                               



                                               
                                                <div class="advert-banner with-box-shadow">
                                                    <div class="product-detail-description"><h3>Product Sizes</h3></div>
                                                    <div class="product-edits">
                                                        <div>
                                                            @empty( json_decode($product->productDetails->technical_details)->product_size)
                                                                <p>You have no product sizes set</p>
                                                            @else
                                                            <ul>
                                                                @php
                                                                    $productSize =  json_decode($product->productDetails->technical_details)->product_size;
                                                                    $productSize = json_decode($productSize);
                                                                @endphp
                                                                @foreach($productSize as $size)
                                                                    <li>{{ $size }}</li>
                                                                @endforeach
                                                                
                                                            </ul>
                                                        @endempty
                                                        </div>
                                                        <div>
                                                            <a href="#variant_container" id="product_variant__size_edit" class="green-bg color-green">Edit</a>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                             
                                                
                                            </div>
                                        </div>



                                            {{-- forms below --}}
                                    <form method="post" action="{{ route('admin.product.patch') }}" enctype="multipart/form-data">
                                        @method('patch')
                                        @csrf
                                        
                                        <div class="lg-grid-70-30 ">
                                            <div class=" grid-col-70 ">
                                                <div class="with-box-shadow white-bg rounded-edges padding-20 mt-20 mt-sm-20" style="display: none;" id="product_name_description">
                                                    {{-- <div class=""><h6 class="product-name">Product Information</h6></div> --}}
                                                    <div class="row form-row" id="product_name" style="display: none;">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Product Name</label>
                                                                <input id="product_name_input" type="text" class="form-control appearance-text-field @error('product_name') is-invalid @enderror" placeholder="Product Name">
                                                                @error('product_name')
                                                                    <div class="help-block form-text with-errors form-control-feedback">{{$message}}</div>
                                                                 @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row form-row" style="display: none;" id="product_description">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Description</label>
                                                                <textarea id="product_description_input" class="form-control" id="exampleFormControlTextarea1" rows="6" placeholder="Product description"></textarea>
                                                                @error('product_description')
                                                                    <div class="help-block form-text with-errors form-control-feedback">{{$message}}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <section id="image_upload" style="display: none;">
                                                    <div id="image_banner_wrap" class="image_banner_wrap mt-20 mt-20-sm" style="display: none;">
                                                        <div class="image-banner-container white-bg with-box-shadow" id="image-preview-container" >
                                                            <div class="banner-preview" >
                                                                <img  class="setImagePreview-1" id="setImagePreview-1" src=""/>
                                                            </div>
                                                            <div class="preview-image-details">
                                                                <p class="preview-image-name" id="preview-image-name-1">image-name.jpg</p>
                                                                <p class="preview-image-size" id="preview-image-size-1">KB</p>
                                                            
                                                            </div>
                                                            
                                                        </div>
                                                        
                                                        
                                                    </div>
                                                
                                                    <div class="product-image-dropzone mt-20 mt-20-sm  with-box-shadow white-bg rounded-edges padding-20" >
                                                        <div><h6 class="product-name">New Product Image </h6></div>
                                                        <div class="file-upload-wrapper">
                                                            <div  class="upload-info">
                                                                <p ><i class="bi bi-cloud-upload"></i></p>
                                                                <p class="drag-drop">drag and drop image here</p>
                                                                <p class="drag-drop">Recommended dimmension- width:627px , height:470px</p>
                                                                <button class="upload-product-images">click to upload</button>
                                                            </div>

                                                            <input required name="product_id"  type="hidden" value="{{ $product->id }}" />
                                                            <input  name="banner_1" accept="image" type="file" id="images-input-1" class="product-image-upload file-upload @error('logo_colored') is-invalid @enderror" data-height="500" />
                                                            @error('logo_colored')
                                                                <div class="help-block form-text with-errors form-control-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </section>

                                                <div id="variant_container"  class=" mt-20 mt-20-sm mt-20 mt-20-sm with-box-shadow white-bg rounded-edges padding-20" style="display: none;">
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


                                            <div class="grid-col-30 mt-20-sm" style="display: none;" id="proceed">
                                                <div class="with-box-shadow white-bg rounded-edges padding-20" style="display: none;" id="product_price">
                                                    <div ><h6 class="product-name">Pricing</h6></div>
                                                    <div class="row form-row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Base Price</label>
                                                                <input id="product_price_base" type="number" class="form-control appearance-text-field @error('product_price') is-invalid @enderror"  placeholder="Base Price">
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
                                                                <input id="product_discount_price"  type="number" class="form-control appearance-text-field @error('product_discount_price') is-invalid @enderror"  placeholder="Leave empty if no discount">
                                                                @error('product_discount_price')
                                                                    <div class="help-block form-text with-errors form-control-feedback">{{$message}}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class=" mt-20 mt-20-sm  with-box-shadow white-bg rounded-edges padding-20" style="display: none;" id="organise">
                                                    <div><h6 class="product-name">Organise</h6></div>
                                                    <div class="row form-row" id="product_brand" style="display: none;">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label flexed-label" ><span class="flexed-label-span">Brand</span> <a href="{{ route('admin.brand.new') }}" class="flexed-label-anchor">New Brand</a></label>
                                                                <select class="form-select"  id="product_brand_select" >
                                                                    
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
                                                    <div class="row form-row" style="display: none;" id="product_category_container">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                @include('layouts.productCategoriesSelection')
                                                                <label class="form-label flexed-label" ><span class="flexed-label-span">Category</span> <a href="#" class="flexed-label-anchor">New Category</a></label>
                                                                <select class="form-select"  id="product_category"  >
                                                                    <option value="" id="selectProductCategorybtn" >Select Product Category</option>
                                                                    
                                                                    
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="row form-row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Collection</label>
                                                                <input type="text" class="form-control appearance-text-field @error('') is-invalid @enderror"  name="product_" placeholder="Collection">
                                                            </div>
                                                        </div>
                                                    </div> --}}
                                                    
                                                </div>
                                                
                                                <div class="mt-20 mt-20-sm with-box-shadow white-bg rounded-edges padding-20">
                                                    {{-- <div style="display: none;"><h6 class="product-name">Inventory</h6></div>
                                                    <div class="row form-row" style="display: none;">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Add to Stock</label>
                                                                <input   type="number" class="form-control appearance-text-field @error('product_inventory') is-invalid @enderror"  name="product_inventory" placeholder="Product Stock">
                                                                @error('product_inventory')
                                                                    <div class="help-block form-text with-errors form-control-feedback">{{$message}}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div> --}}
                                                    <div class="row form-row" >
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