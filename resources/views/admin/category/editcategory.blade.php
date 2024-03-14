<!doctype html>
<html>
    <head>
        <title>Edit {{ $category->category_name }} | Admin</title>
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
                            <div>
                                <div class="header-details">
                                    <div>
                                        <div class="order-id-wrap">
                                            <h6 class="">{{ $category->category_name }}</h6>
                                            
                                        </div>
                                        
                                       <small class="order-extra-details">Edit category here</small>
                                    </div>
                                    <div class="delete-order-container">
                                        <div><a href="{{ route('admin.categories') }}" class="red-bg color-red button-1 no-text-deco">View categories</a></div>
                                    </div>
                                </div>
                                <div class="padding-5">
                                    <form method="post" action="{{ route('admin.category.patch') }}" enctype="multipart/form-data">
                                        @method('patch')
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
                                               
                                                <div id="image_preview_wrap" class="image_preview_wrap">
                                                    <div class="image-preview-container white-bg with-box-shadow">
                                                        <div class="image-preview">
                                                            <img class="setImagePreview" src="" />
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
                                                            <p class="drag-drop">drag and drop images here</p>
                                                            <button class="upload-product-images">click to upload</button>
                                                        </div>
                                                        
                                                        <input name="category_image" accept="image" type="file" id="banner-images-input" class="product-image-upload file-upload @error('category_image') is-invalid @enderror" data-height="500" multiple/>
                                                        @error('category_image')
                                                                    <div class="help-block form-text with-errors form-control-feedback">{{$message}}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                
                                                
                                            </div>


                                            <div class="grid-col-30 mt-20 mt-20-sm" >
                                                <div class="with-box-shadow white-bg rounded-edges padding-20">
                                                    <div ><h6 class="product-name">Category Information</h6></div>
                                                    <div class="row form-row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Category Name</label>
                                                                <input type="hidden" name="category_id" value="{{ $category->id }}">
                                                                <input value="{{ $category->category_name }}" name="category_name" required type="text" class="form-control appearance-text-field @error('category_name') is-invalid @enderror " placeholder="Category Name">
                                                                @error('category_name')
                                                                    <div class="help-block form-text with-errors form-control-feedback">{{$message}}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row form-row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                               <button class="btn btn-primary green-bg color-green button-2">Click to Proceed</button>
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