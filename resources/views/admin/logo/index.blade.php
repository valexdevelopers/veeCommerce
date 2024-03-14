<!doctype html>
<html>
    <head>
        <title>Logo | Admin</title>
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
                                            <h6 class="">Store Logo </h6>
                                            
                                        </div>
                                        
                                       <small class="order-extra-details">Add, Change, Delete your website logo here.</small>
                                    </div>
                                    {{-- <div class="delete-order-container">
                                        <div><a href="{{ route('admin.advert-banner') }}" class="red-bg color-red button-1 no-text-deco">View Advert banners</a></div>
                                    </div> --}}
                                </div>
                                @if($logos->count() > 0)
                                    <div class="advert-banner-wrap">
                                        @foreach($logos as $logo)
                                            <div class="advert-banner with-box-shadow">
                                                <div class="" style="display: grid; place-items:center;">
                                                    <div class="advert-images" style="width: 100px; height:40px"><img src="{{asset('storage/'.$logo->logo) }}"></div>
                                                    
                                                </div>
                                                
                                            </div>
                                            <div class="advert-banner with-box-shadow" style="background: green;" >
                                                <div class="" style="display: grid; place-items:center;">
                                                    <div class="advert-images" style="width: 100px; height:40px"><img src="{{asset('storage/'.$logo->logowhite) }}"></div>
                                                    
                                                </div>
                                                
                                            </div>
                                        @endforeach
                                        
                                        
                                        
                                    </div>

                                @else
                                    <div class="not-added-wrap">
                                        <div class="not-added-yet">
                                            <div class="notadded-icon"> <i class="bi bi-badge-ad"></i></div>
                                            <h3>You do not have a store logo yet</h3>
                                            <p>Your store logo will show up here as you add it, 
                                                ensure to add store logo they are your store and brand identity. </p>


                                            <div class="not-added-add-now">
                                                <a href="#addlogoform">Add Logo</a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="padding-5">
                                    <form id="addlogoform" method="post" action="{{ route('admin.logo.create') }}" enctype="multipart/form-data">
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
                                                    <div class="image-banner-container white-bg with-box-shadow" id="image-preview-container" >
                                                        <div class="banner-preview" >
                                                            <img  class="setImagePreview-1" id="setImagePreview-1" src="{{asset('content/uploads/advertbanner/topadvertbanner.gif') }}"/>
                                                        </div>
                                                        <div class="preview-image-details">
                                                            <p class="preview-image-name" id="preview-image-name-1">image-name.jpg</p>
                                                            <p class="preview-image-size" id="preview-image-size-1">1.3KB</p>
                                                           
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                    
                                                </div>
                                                <div class="product-image-dropzone mt-20 mt-20-sm  with-box-shadow white-bg rounded-edges padding-20">
                                                    <div><h6 class="product-name">Logo Images (colored)</h6></div>
                                                    <div class="file-upload-wrapper">
                                                        <div  class="upload-info">
                                                            <p ><i class="bi bi-cloud-upload"></i></p>
                                                            <p class="drag-drop">drag and drop only png image here</p>
                                                            <p class="drag-drop">Recommended dimmension- width:100px , height:40px</p>
                                                            <button class="upload-product-images">click to upload</button>
                                                        </div>
                                                        
                                                        <input required name="logo_colored" accept="image" type="file" id="images-input-1" class="product-image-upload file-upload @error('logo_colored') is-invalid @enderror" data-height="500" />
                                                        @error('logo_colored')
                                                            <div class="help-block form-text with-errors form-control-feedback">{{$message}}</div>
                                                        @enderror
                                                     </div>
                                                </div>
                                                
                                                
                                                
                                            </div>


                                            <div class="grid-col-30 mt-20-sm" >
                                                
                                                <div id="image_banner_wrap-2" class="image_banner_wrap mt-20 mt-20-sm">
                                                    <div class="image-banner-container white-bg with-box-shadow" id="image-preview-container" >
                                                        <div class="banner-preview" style="background:green" >
                                                            <img  class="setImagePreview-1" id="setImagePreview-2" src="{{asset('content/uploads/advertbanner/topadvertbanner.gif') }}"/>
                                                        </div>
                                                        <div class="preview-image-details">
                                                            <p class="preview-image-name" id="preview-image-name-2">image-name.jpg</p>
                                                            <p class="preview-image-size" id="preview-image-size-2">1.3KB</p>
                                                            
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                    
                                                </div>
                                                <div class="mt-20 mt-20-sm with-box-shadow white-bg rounded-edges padding-20">
                                                    <div class="product-image-dropzone ">
                                                        <div><h6 class="product-name"> Logo2 Image (White)</h6></div>
                                                        <div class="file-upload-wrapper">
                                                            <div  class="upload-info">
                                                                <p ><i class="bi bi-cloud-upload"></i></p>
                                                                <p class="drag-drop">drag and drop image here</p>
                                                                <p class="drag-drop">Recommended dimmension- width:100px , height:40px</p>
                                                                <button class="upload-product-images">click to upload</button>
                                                            </div>
                                                            
                                                            <input required name="logo_white" accept="image" type="file" id="images-input-2" class="product-image-upload file-upload @error('logo_white') is-invalid @enderror" data-height="500" />
                                                            @error('logo_white')
                                                                <div class="help-block form-text with-errors form-control-feedback">{{$message}}</div>
                                                            @enderror
                                                         </div>
                                                    </div>
                                                    
                                                </div>
                                                 <div class=" mt-20 mt-20-sm  with-box-shadow white-bg rounded-edges padding-20">
                                                    
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