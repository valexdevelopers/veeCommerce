<!doctype html>
<html>
    <head>
        <title>New Advert Banner | Admin</title>
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
                                            <h6 class="">New Advert Banner </h6>
                                            
                                        </div>
                                        
                                       <small class="order-extra-details">Advert banners show at the top of your website</small>
                                    </div>
                                    <div class="delete-order-container">
                                        <div><a href="{{ route('admin.advert-banner') }}" class="red-bg color-red button-1 no-text-deco">View Advert banners</a></div>
                                    </div>
                                </div>
                                <div class="padding-5">
                                    <form method="post" action="{{ route('admin.advert-banner.create') }}" enctype="multipart/form-data">
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
                                                <div id="image_banner_wrap" class="image_banner_wrap mt-20 mt-20-sm">
                                                    <div class="image-banner-container white-bg with-box-shadow" id="image-preview-container" style="width: 100%">
                                                        <div class="banner-preview">
                                                            <img class="setImagePreview-1" id="setImagePreview-1" src="{{asset('content/uploads/advertbanner/topadvertbanner.gif') }}"/>
                                                        </div>
                                                        <div class="preview-image-details">
                                                            <p class="preview-image-name" id="preview-image-name-1">image-name.jpg</p>
                                                            <p class="preview-image-size" id="preview-image-size-1">1.3KB</p>
                                                           
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                    
                                                </div>
                                                <div class="product-image-dropzone mt-20 mt-20-sm  with-box-shadow white-bg rounded-edges padding-20">
                                                    <div><h6 class="product-name">Product Images</h6></div>
                                                    <div class="file-upload-wrapper">
                                                        <div  class="upload-info">
                                                            <p ><i class="bi bi-cloud-upload"></i></p>
                                                            <p class="drag-drop">drag and drop image here</p>
                                                            <p class="drag-drop">Recommended dimmension- width:1170px , height:60px</p>
                                                            <button class="upload-product-images">click to upload</button>
                                                        </div>
                                                        
                                                        <input required name="banner_image" accept="image" type="file" id="images-input-1" class="product-image-upload file-upload @error('banner_image') is-invalid @enderror" data-height="500" />
                                                        @error('banner_image')
                                                            <div class="help-block form-text with-errors form-control-feedback">{{$message}}</div>
                                                        @enderror
                                                     </div>
                                                </div>
                                                
                                                
                                            </div>


                                            <div class="grid-col-30 mt-20-sm" >
                                                <div class="mt-20 mt-20-sm with-box-shadow white-bg rounded-edges padding-20">
                                                    <div class=""><h6 class="product-name">Product Information</h6></div>
                                                    <div class="row form-row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Advert Banner Name</label>
                                                                <input value="{{ old('banner_name') }}" type="text" class="form-control appearance-text-field @error('banner_name') is-invalid @enderror" required name="banner_name" placeholder="Product Name">
                                                                @error('banner_name')
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
                                                                <label class="form-label flexed-label" ><span class="flexed-label-span">Visibility</span> </label>
                                                                <select class="form-select"  id="country" name="banner_visibility" required>
                                                                    <option value="" disabled selected>Select Visibility</option>
                                                                    <option value="show" >Set as Store Advert Banner</option>   
                                                                    <option value="hide">Hide as Store Advert Banner</option>
                                                                </select>
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