<!doctype html>
<html>
    <head>
        <title>Admin | Home</title>
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
                                                <a href="#" class="create-invoice-btn darkblue-bg no-text-deco color-cream"> <i class="bi bi-plus"></i> <span>Create Invoice</span></a>
                                            
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

                                    <table class="table product-table">
                                    
                                        <thead>
                                            <tr >
                                                
                                                <td>ID</td>
                                                <td>STATUS</td>
                                                <td>USER</td>
                                                
                                                <td>COUPON</td>
                                                <td>DISCOUNT</td>
                                                <td>DATE</td>
                                                <td>TOTAL</td>
                                               
                                                <td>Actions</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <tr >
                                               
                                                <td>
                                                    <span title="edfxghjgfdsasdfxgcfds1s32d" class="product-id-truncated">edfxghjgfdsasdfxgcfds1s32d</span></td>
                                                <td><span class="green-bg color-green button-2">Delivered</span></td>
                                                <td class="">
                                                    <div class="product">
                                                        <div class="user-image-wrap">
                                                            <div class="product-avatar rounded-image-wrap">
                                                                <span class="user-no-image rounded-image with-box-shadow white-bg color-blue">VE</span>
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="d-flex flex-column">
                                                            <h6 class="product-name  user-name-table mb-0" >Virtue Egerega</h6>
                                                            <small class="product-description-small">egeregav@gmail.com</small>
                                                        </div>
                                                    </div>
                                                        
                                                </td>
                                                <td class="grey-text" style="color: #6f6b7d;"><span>NEWCOM15</span> </td>
                                                <td class="grey-text" style="color: #6f6b7d;"><span>₦12,212</span> </td>
                                               
                                                <td class="grey-text" style="color: #6f6b7d;"><span>12-12-2022</span> </td>
                                                
                                                <td class="grey-text" style="color: #6f6b7d;"><span>₦112,212</span> </td>
                                                
                                               
                                                <td>
                                                    <div class="actions-td">
                                                        
                                                        <a href="#" class="actions-btng grey-text no-text-deco" title="view more"><i class="bi bi-eye"></i></a>
                                                        <a  role="button" class="actions-btn grey-text no-text-deco" title="more actions" onclick="document.getElementById('extra-actions').style.display = 'block'; return false"><i class="bi bi-three-dots-vertical"></i></a>
                                                        <div class="extra-actions with-box-shadow white-bg" id="extra-actions">
                                                            <div class="close-row grey-bg-hover" ><a href="#" class="actions-btn-hidden no-text-deco " title="view more">Details</a> <i class="bi bi-x" role="button"  onclick="document.getElementById('extra-actions').style.display = 'none'"></i></div>
                                                            
                                                            <form class="">
                                                                <div class="row form-row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <input type="hidden" class="form-control">
                                                                            <button class="extra-actions-btn color-blue grey-bg-hover" type="submit" id="button-addon1" >Ready For Pickup</button>
                                                                            <button class="extra-actions-btn color-green grey-bg-hover" type="submit" id="button-addon1" >Mark As Delivered</button>
                                                                            <button class="extra-actions-btn color-yellow grey-bg-hover" type="submit" id="button-addon1" >Out for Delivery</button>
                                                                            <button class="extra-actions-btn delete-btn grey-bg-hover" type="submit" id="button-addon1" >Delete</button>

                                                                        </div>
                                                                    </div>
                                                                                                    
                                                            </form>  
                                                        </div>
                                                    </div>
                                                    
                                                </td>
                                            </tr>
                                            <tr >
                                               
                                                <td>
                                                    <span title="edfxghjgfdsasdfxgcfds1s32d" class="product-id-truncated">edfxghjgfdsasdfxgcfds1s32d</span></td>
                                                <td><span class="blue-bg color-blue button-2">Ready for pickup</span></td>
                                                <td class="">
                                                    <div class="product">
                                                        <div class="user-image-wrap">
                                                            <div class="product-avatar rounded-image-wrap">
                                                                <span class="user-no-image rounded-image with-box-shadow white-bg color-red">VE</span>
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="d-flex flex-column">
                                                            <h6 class="product-name  user-name-table mb-0" >Virtue Egerega</h6>
                                                            <small class="product-description-small">egeregav@gmail.com</small>
                                                        </div>
                                                    </div>
                                                        
                                                </td>
                                                <td class="grey-text" style="color: #6f6b7d;"><span>XMAS40</span> </td>
                                                <td class="grey-text" style="color: #6f6b7d;"><span>₦12,212</span> </td>
                                                
                                                <td class="grey-text" style="color: #6f6b7d;"><span>12-12-2022</span> </td>
                                                <td class="grey-text" style="color: #6f6b7d;"><span>₦112,212</span> </td>
                                                <td>
                                                    <div class="actions-td">
                                                        
                                                        <a href="#" class="actions-btng grey-text no-text-deco" title="view more"><i class="bi bi-eye"></i></a>
                                                        <a  role="button" class="actions-btn grey-text no-text-deco" title="more actions" onclick="document.getElementById('extra-actions').style.display = 'block'; return false"><i class="bi bi-three-dots-vertical"></i></a>
                                                        <div class="extra-actions with-box-shadow white-bg" id="extra-actions">
                                                            <div class="close-row grey-bg-hover" ><a href="#" class="actions-btn-hidden no-text-deco " title="view more">Details</a> <i class="bi bi-x" role="button"  onclick="document.getElementById('extra-actions').style.display = 'none'"></i></div>
                                                            
                                                            <form class="">
                                                                <div class="row form-row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <input type="hidden" class="form-control">
                                                                            <button class="extra-actions-btn color-blue grey-bg-hover" type="submit" id="button-addon1" >Ready For Pickup</button>
                                                                            <button class="extra-actions-btn color-green grey-bg-hover" type="submit" id="button-addon1" >Mark As Delivered</button>
                                                                            <button class="extra-actions-btn color-yellow grey-bg-hover" type="submit" id="button-addon1" >Out for Delivery</button>
                                                                            <button class="extra-actions-btn delete-btn grey-bg-hover" type="submit" id="button-addon1" >Delete</button>

                                                                        </div>
                                                                    </div>
                                                                                                    
                                                            </form>  
                                                        </div>
                                                    </div>
                                                    
                                                </td>
                                                <tr >
                                               
                                                <td>
                                                    <span title="edfxghjgfdsasdfxgcfds1s32d" class="product-id-truncated">edfxghjgfdsasdfxgcfds1s32d</span></td>
                                                    <td><span class="yellow-bg color-yellow button-2">Out for delivery</span></td>
                                                    <td class="">
                                                        <div class="product">
                                                            <div class="user-image-wrap">
                                                                <div class="product-avatar rounded-image-wrap">
                                                                    <span class="user-no-image rounded-image with-box-shadow white-bg color-green">VE</span>
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="d-flex flex-column">
                                                                <h6 class="product-name  user-name-table mb-0" >Virtue Egerega</h6>
                                                                <small class="product-description-small">egeregav@gmail.com</small>
                                                            </div>
                                                        </div>
                                                        
                                                    </td>
                                                    <td class="grey-text" style="color: #6f6b7d;"><span>XMAS40</span> </td>
                                                    <td class="grey-text" style="color: #6f6b7d;"><span>₦12,212</span> </td>
                                                    
                                                    <td class="grey-text" style="color: #6f6b7d;"><span>12-12-2022</span> </td>
                                                    <td class="grey-text" style="color: #6f6b7d;"><span>₦112,212</span> </td>
                                                    <td>
                                                        <div class="actions-td">
                                                        
                                                        <a href="#" class="actions-btng grey-text no-text-deco" title="view more"><i class="bi bi-eye"></i></a>
                                                        <a  role="button" class="actions-btn grey-text no-text-deco" title="more actions" onclick="document.getElementById('extra-actions').style.display = 'block'; return false"><i class="bi bi-three-dots-vertical"></i></a>
                                                        <div class="extra-actions with-box-shadow white-bg" id="extra-actions">
                                                            <div class="close-row grey-bg-hover" ><a href="#" class="actions-btn-hidden no-text-deco " title="view more">Details</a> <i class="bi bi-x" role="button"  onclick="document.getElementById('extra-actions').style.display = 'none'"></i></div>
                                                            
                                                            <form class="">
                                                                <div class="row form-row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <input type="hidden" class="form-control">
                                                                            <button class="extra-actions-btn color-blue grey-bg-hover" type="submit" id="button-addon1" >Ready For Pickup</button>
                                                                            <button class="extra-actions-btn color-green grey-bg-hover" type="submit" id="button-addon1" >Mark As Delivered</button>
                                                                            <button class="extra-actions-btn color-yellow grey-bg-hover" type="submit" id="button-addon1" >Out for Delivery</button>
                                                                            <button class="extra-actions-btn delete-btn grey-bg-hover" type="submit" id="button-addon1" >Delete</button>

                                                                        </div>
                                                                    </div>
                                                                                                    
                                                            </form>  
                                                        </div>
                                                    </div>
                                                        
                                                    </td>
                                                </tr>
                                                <tr >
                                                   
                                                    <td>
                                                    <span title="edfxghjgfdsasdfxgcfds1s32d" class="product-id-truncated">edfxghjgfdsasdfxgcfds1s32d</span></td>
                                                    <td><span class="blue-bg color-blue button-2">Ready for pickup</span></td>
                                                    <td class="">
                                                        <div class="product">
                                                            <div class="user-image-wrap">
                                                                <div class="product-avatar rounded-image-wrap">
                                                                    <span class="user-no-image rounded-image with-box-shadow white-bg color-blue">VE</span>
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="d-flex flex-column">
                                                                <h6 class="product-name  user-name-table mb-0" >Virtue Egerega</h6>
                                                                <small class="product-description-small">egeregav@gmail.com</small>
                                                            </div>
                                                        </div>
                                                        
                                                    </td>
                                                    <td class="grey-text" style="color: #6f6b7d;"><span>XMAS40</span> </td>
                                                    <td class="grey-text" style="color: #6f6b7d;"><span>₦12,212</span> </td>
                                                    
                                                    <td class="grey-text" style="color: #6f6b7d;"><span>12-12-2022</span> </td>
                                                <td class="grey-text" style="color: #6f6b7d;"><span>₦112,212</span> </td>
                                                    <td>
                                                        <div class="actions-td">
                                                        
                                                        <a href="#" class="actions-btng grey-text no-text-deco" title="view more"><i class="bi bi-eye"></i></a>
                                                        <a  role="button" class="actions-btn grey-text no-text-deco" title="more actions" onclick="document.getElementById('extra-actions').style.display = 'block'; return false"><i class="bi bi-three-dots-vertical"></i></a>
                                                        <div class="extra-actions with-box-shadow white-bg" id="extra-actions">
                                                            <div class="close-row grey-bg-hover" ><a href="#" class="actions-btn-hidden no-text-deco " title="view more">Details</a> <i class="bi bi-x" role="button"  onclick="document.getElementById('extra-actions').style.display = 'none'"></i></div>
                                                            
                                                            <form class="">
                                                                <div class="row form-row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <input type="hidden" class="form-control">
                                                                            <button class="extra-actions-btn color-blue grey-bg-hover" type="submit" id="button-addon1" >Ready For Pickup</button>
                                                                            <button class="extra-actions-btn color-green grey-bg-hover" type="submit" id="button-addon1" >Mark As Delivered</button>
                                                                            <button class="extra-actions-btn color-yellow grey-bg-hover" type="submit" id="button-addon1" >Out for Delivery</button>
                                                                            <button class="extra-actions-btn delete-btn grey-bg-hover" type="submit" id="button-addon1" >Delete</button>

                                                                        </div>
                                                                    </div>
                                                                                                    
                                                            </form>  
                                                        </div>
                                                    </div>
                                                        
                                                    </td>
                                                </tr>
                                                <tr >
                                                   
                                                    <td>
                                                    <span title="edfxghjgfdsasdfxgcfds1s32d" class="product-id-truncated">edfxghjgfdsasdfxgcfds1s32d</span></td>
                                                    <td><span class="blue-bg color-blue button-2">Ready for pickup</span></td>
                                                    <td class="">
                                                        <div class="product">
                                                            <div class="user-image-wrap">
                                                                <div class="product-avatar rounded-image-wrap">
                                                                    <span class="user-no-image rounded-image with-box-shadow white-bg color-blue">VE</span>
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="d-flex flex-column">
                                                                <h6 class="product-name  user-name-table mb-0" >Virtue Egerega</h6>
                                                                <small class="product-description-small">egeregav@gmail.com</small>
                                                            </div>
                                                        </div>
                                                        
                                                    </td>
                                                    <td class="grey-text" style="color: #6f6b7d;"><span>XMAS40</span> </td>
                                                    <td class="grey-text" style="color: #6f6b7d;"><span>₦12,212</span> </td>
                                                    
                                                    <td class="grey-text" style="color: #6f6b7d;"><span>12-12-2022</span> </td>
                                                <td class="grey-text" style="color: #6f6b7d;"><span>₦112,212</span> </td>
                                                    <td>
                                                        <div class="actions-td">
                                                        
                                                        <a href="#" class="actions-btng grey-text no-text-deco" title="view more"><i class="bi bi-eye"></i></a>
                                                        <a  role="button" class="actions-btn grey-text no-text-deco" title="more actions" onclick="document.getElementById('extra-actions').style.display = 'block'; return false"><i class="bi bi-three-dots-vertical"></i></a>
                                                        <div class="extra-actions with-box-shadow white-bg" id="extra-actions">
                                                            <div class="close-row grey-bg-hover" ><a href="#" class="actions-btn-hidden no-text-deco " title="view more">Details</a> <i class="bi bi-x" role="button"  onclick="document.getElementById('extra-actions').style.display = 'none'"></i></div>
                                                            
                                                            <form class="">
                                                                <div class="row form-row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <input type="hidden" class="form-control">
                                                                            <button class="extra-actions-btn color-blue grey-bg-hover" type="submit" id="button-addon1" >Ready For Pickup</button>
                                                                            <button class="extra-actions-btn color-green grey-bg-hover" type="submit" id="button-addon1" >Mark As Delivered</button>
                                                                            <button class="extra-actions-btn color-yellow grey-bg-hover" type="submit" id="button-addon1" >Out for Delivery</button>
                                                                            <button class="extra-actions-btn delete-btn grey-bg-hover" type="submit" id="button-addon1" >Delete</button>

                                                                        </div>
                                                                    </div>
                                                                                                    
                                                            </form>  
                                                        </div>
                                                    </div>
                                                        
                                                    </td>
                                                </tr>

                                                <tr >
                                                   
                                                    <td>
                                                    <span title="edfxghjgfdsasdfxgcfds1s32d" class="product-id-truncated">edfxghjgfdsasdfxgcfds1s32d</span></td>
                                                    <td><span class="yellow-bg color-yellow button-2">Out for delivery</span></td>
                                                    <td class="">
                                                        <div class="product">
                                                            <div class="user-image-wrap">
                                                                <div class="product-avatar rounded-image-wrap">
                                                                    <span class="user-no-image rounded-image with-box-shadow white-bg color-blue">VE</span>
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="d-flex flex-column">
                                                                <h6 class="product-name  user-name-table mb-0" >Virtue Egerega</h6>
                                                                <small class="product-description-small">egeregav@gmail.com</small>
                                                            </div>
                                                        </div>
                                                        
                                                    </td>
                                                    <td class="grey-text" style="color: #6f6b7d;"><span>XMAS40</span> </td>
                                                    <td class="grey-text" style="color: #6f6b7d;"><span>₦12,212</span> </td>
                                                    
                                                    <td class="grey-text" style="color: #6f6b7d;"><span>12-12-2022</span> </td>
                                                <td class="grey-text" style="color: #6f6b7d;"><span>₦112,212</span> </td>
                                                    <td>
                                                        <div class="actions-td">
                                                        
                                                        <a href="#" class="actions-btng grey-text no-text-deco" title="view more"><i class="bi bi-eye"></i></a>
                                                        <a  role="button" class="actions-btn grey-text no-text-deco" title="more actions" onclick="document.getElementById('extra-actions').style.display = 'block'; return false"><i class="bi bi-three-dots-vertical"></i></a>
                                                        <div class="extra-actions with-box-shadow white-bg" id="extra-actions">
                                                            <div class="close-row grey-bg-hover" ><a href="#" class="actions-btn-hidden no-text-deco " title="view more">Details</a> <i class="bi bi-x" role="button"  onclick="document.getElementById('extra-actions').style.display = 'none'"></i></div>
                                                            
                                                            <form class="">
                                                                <div class="row form-row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <input type="hidden" class="form-control">
                                                                            <button class="extra-actions-btn color-blue grey-bg-hover" type="submit" id="button-addon1" >Ready For Pickup</button>
                                                                            <button class="extra-actions-btn color-green grey-bg-hover" type="submit" id="button-addon1" >Mark As Delivered</button>
                                                                            <button class="extra-actions-btn color-yellow grey-bg-hover" type="submit" id="button-addon1" >Out for Delivery</button>
                                                                            <button class="extra-actions-btn delete-btn grey-bg-hover" type="submit" id="button-addon1" >Delete</button>

                                                                        </div>
                                                                    </div>
                                                                                                    
                                                            </form>  
                                                        </div>
                                                    </div>
                                                        
                                                    </td>
                                                </tr>
                                                <tr >
                                                   
                                                    <td>
                                                    <span title="edfxghjgfdsasdfxgcfds1s32d" class="product-id-truncated">edfxghjgfdsasdfxgcfds1s32d</span></td>
                                                <td><span class="yellow-bg color-yellow button-2">Out for delivery</span></td>
                                                    <td class="">
                                                        <div class="product">
                                                            <div class="user-image-wrap">
                                                                <div class="product-avatar rounded-image-wrap">
                                                                    <span class="user-no-image rounded-image with-box-shadow white-bg color-blue">VE</span>
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="d-flex flex-column">
                                                                <h6 class="product-name  user-name-table mb-0" >Virtue Egerega</h6>
                                                                <small class="product-description-small">egeregav@gmail.com</small>
                                                            </div>
                                                        </div>
                                                        
                                                    </td>
                                                    <td class="grey-text" style="color: #6f6b7d;"><span>XMAS40</span> </td>
                                                    <td class="grey-text" style="color: #6f6b7d;"><span>₦12,212</span> </td>
                                                    
                                                    <td class="grey-text" style="color: #6f6b7d;"><span>12-12-2022</span> </td>
                                                <td class="grey-text" style="color: #6f6b7d;"><span>₦112,212</span> </td>
                                                    <td>
                                                        <div class="actions-td">
                                                        
                                                        <a href="#" class="actions-btng grey-text no-text-deco" title="view more"><i class="bi bi-eye"></i></a>
                                                        <a  role="button" class="actions-btn grey-text no-text-deco" title="more actions" onclick="document.getElementById('extra-actions').style.display = 'block'; return false"><i class="bi bi-three-dots-vertical"></i></a>
                                                        <div class="extra-actions with-box-shadow white-bg" id="extra-actions">
                                                            <div class="close-row grey-bg-hover" ><a href="#" class="actions-btn-hidden no-text-deco " title="view more">Details</a> <i class="bi bi-x" role="button"  onclick="document.getElementById('extra-actions').style.display = 'none'"></i></div>
                                                            
                                                            <form class="">
                                                                <div class="row form-row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <input type="hidden" class="form-control">
                                                                            <button class="extra-actions-btn color-blue grey-bg-hover" type="submit" id="button-addon1" >Ready For Pickup</button>
                                                                            <button class="extra-actions-btn color-green grey-bg-hover" type="submit" id="button-addon1" >Mark As Delivered</button>
                                                                            <button class="extra-actions-btn color-yellow grey-bg-hover" type="submit" id="button-addon1" >Out for Delivery</button>
                                                                            <button class="extra-actions-btn delete-btn grey-bg-hover" type="submit" id="button-addon1" >Delete</button>

                                                                        </div>
                                                                    </div>
                                                                                                    
                                                            </form>  
                                                        </div>
                                                    </div>
                                                        
                                                    </td>
                                                </tr>
                                                <tr >
                                                   
                                                    <td>
                                                    <span title="edfxghjgfdsasdfxgcfds1s32d" class="product-id-truncated">edfxghjgfdsasdfxgcfds1s32d</span></td>
                                                <td><span class="yellow-bg color-yellow button-2">Out for delivery</span></td>
                                                    <td class="">
                                                        <div class="product">
                                                            <div class="user-image-wrap">
                                                                <div class="product-avatar rounded-image-wrap">
                                                                    <span class="user-no-image rounded-image with-box-shadow white-bg color-blue">VE</span>
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="d-flex flex-column">
                                                                <h6 class="product-name  user-name-table mb-0" >Virtue Egerega</h6>
                                                                <small class="product-description-small">egeregav@gmail.com</small>
                                                            </div>
                                                        </div>
                                                        
                                                    </td>
                                                    <td class="grey-text" style="color: #6f6b7d;"><span>XMAS40</span> </td>
                                                    <td class="grey-text" style="color: #6f6b7d;"><span>₦12,212</span> </td>
                                                    
                                                    <td class="grey-text" style="color: #6f6b7d;"><span>12-12-2022</span> </td>
                                                <td class="grey-text" style="color: #6f6b7d;"><span>₦112,212</span> </td>
                                                    <td>
                                                        <div class="actions-td">
                                                        
                                                        <a href="#" class="actions-btng grey-text no-text-deco" title="view more"><i class="bi bi-eye"></i></a>
                                                        <a  role="button" class="actions-btn grey-text no-text-deco" title="more actions" onclick="document.getElementById('extra-actions').style.display = 'block'; return false"><i class="bi bi-three-dots-vertical"></i></a>
                                                        <div class="extra-actions with-box-shadow white-bg" id="extra-actions">
                                                            <div class="close-row grey-bg-hover" ><a href="#" class="actions-btn-hidden no-text-deco " title="view more">Details</a> <i class="bi bi-x" role="button"  onclick="document.getElementById('extra-actions').style.display = 'none'"></i></div>
                                                            
                                                            <form class="">
                                                                <div class="row form-row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <input type="hidden" class="form-control">
                                                                            <button class="extra-actions-btn color-blue grey-bg-hover" type="submit" id="button-addon1" >Ready For Pickup</button>
                                                                            <button class="extra-actions-btn color-green grey-bg-hover" type="submit" id="button-addon1" >Mark As Delivered</button>
                                                                            <button class="extra-actions-btn color-yellow grey-bg-hover" type="submit" id="button-addon1" >Out for Delivery</button>
                                                                            <button class="extra-actions-btn delete-btn grey-bg-hover" type="submit" id="button-addon1" >Delete</button>

                                                                        </div>
                                                                    </div>
                                                                                                    
                                                            </form>  
                                                        </div>
                                                    </div>
                                                        
                                                    </td>
                                                </tr>
                                                <tr >
                                                   
                                                    <td>
                                                    <span title="edfxghjgfdsasdfxgcfds1s32d" class="product-id-truncated">edfxghjgfdsasdfxgcfds1s32d</span></td>
                                                    <td><span class="yellow-bg color-yellow button-2">Out for delivery</span></td>
                                                    <td class="">
                                                        <div class="product">
                                                            <div class="user-image-wrap">
                                                                <div class="product-avatar rounded-image-wrap">
                                                                    <span class="user-no-image rounded-image with-box-shadow white-bg color-blue">VE</span>
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="d-flex flex-column">
                                                                <h6 class="product-name  user-name-table mb-0" >Virtue Egerega</h6>
                                                                <small class="product-description-small">egeregav@gmail.com</small>
                                                            </div>
                                                        </div>
                                                        
                                                    </td>
                                                    <td class="grey-text" style="color: #6f6b7d;"><span>XMAS40</span> </td>
                                                    <td class="grey-text" style="color: #6f6b7d;"><span>₦12,212</span> </td>
                                                    
                                                    <td class="grey-text" style="color: #6f6b7d;"><span>12-12-2022</span> </td>
                                                <td class="grey-text" style="color: #6f6b7d;"><span>₦112,212</span> </td>
                                                    <td>
                                                        <div class="actions-td">
                                                        
                                                        <a href="#" class="actions-btng grey-text no-text-deco" title="view more"><i class="bi bi-eye"></i></a>
                                                        <a  role="button" class="actions-btn grey-text no-text-deco" title="more actions" onclick="document.getElementById('extra-actions').style.display = 'block'; return false"><i class="bi bi-three-dots-vertical"></i></a>
                                                        <div class="extra-actions with-box-shadow white-bg" id="extra-actions">
                                                            <div class="close-row grey-bg-hover" ><a href="#" class="actions-btn-hidden no-text-deco " title="view more">Details</a> <i class="bi bi-x" role="button"  onclick="document.getElementById('extra-actions').style.display = 'none'"></i></div>
                                                            
                                                            <form class="">
                                                                <div class="row form-row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <input type="hidden" class="form-control">
                                                                            <button class="extra-actions-btn color-blue grey-bg-hover" type="submit" id="button-addon1" >Ready For Pickup</button>
                                                                            <button class="extra-actions-btn color-green grey-bg-hover" type="submit" id="button-addon1" >Mark As Delivered</button>
                                                                            <button class="extra-actions-btn color-yellow grey-bg-hover" type="submit" id="button-addon1" >Out for Delivery</button>
                                                                            <button class="extra-actions-btn delete-btn grey-bg-hover" type="submit" id="button-addon1" >Delete</button>

                                                                        </div>
                                                                    </div>
                                                                                                    
                                                            </form>  
                                                        </div>
                                                    </div>
                                                        
                                                    </td>
                                                </tr>
                                                <tr >
                                                   
                                                    <td>
                                                    <span title="edfxghjgfdsasdfxgcfds1s32d" class="product-id-truncated">edfxghjgfdsasdfxgcfds1s32d</span></td>
                                                <td><span class="green-bg color-green button-2">Delivered</span></td>
                                                    <td class="">
                                                        <div class="product">
                                                            <div class="user-image-wrap">
                                                                <div class="product-avatar rounded-image-wrap">
                                                                    <span class="user-no-image rounded-image with-box-shadow white-bg color-blue">VE</span>
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="d-flex flex-column">
                                                                <h6 class="product-name  user-name-table mb-0" >Virtue Egerega</h6>
                                                                <small class="product-description-small">egeregav@gmail.com</small>
                                                            </div>
                                                        </div>
                                                        
                                                    </td>
                                                    <td class="grey-text" style="color: #6f6b7d;"><span>XMAS40</span> </td>
                                                    <td class="grey-text" style="color: #6f6b7d;"><span>₦12,212</span> </td>
                                                    
                                                    <td class="grey-text" style="color: #6f6b7d;"><span>12-12-2022</span> </td>
                                                <td class="grey-text" style="color: #6f6b7d;"><span>₦112,212</span> </td>
                                                    <td>
                                                        <div class="actions-td">
                                                        
                                                        <a href="#" class="actions-btng grey-text no-text-deco" title="view more"><i class="bi bi-eye"></i></a>
                                                        <a  role="button" class="actions-btn grey-text no-text-deco" title="more actions" onclick="document.getElementById('extra-actions').style.display = 'block'; return false"><i class="bi bi-three-dots-vertical"></i></a>
                                                        <div class="extra-actions with-box-shadow white-bg" id="extra-actions">
                                                            <div class="close-row grey-bg-hover" ><a href="#" class="actions-btn-hidden no-text-deco " title="view more">Details</a> <i class="bi bi-x" role="button"  onclick="document.getElementById('extra-actions').style.display = 'none'"></i></div>
                                                            
                                                            <form class="">
                                                                <div class="row form-row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <input type="hidden" class="form-control">
                                                                            <button class="extra-actions-btn color-blue grey-bg-hover" type="submit" id="button-addon1" >Ready For Pickup</button>
                                                                            <button class="extra-actions-btn color-green grey-bg-hover" type="submit" id="button-addon1" >Mark As Delivered</button>
                                                                            <button class="extra-actions-btn color-yellow grey-bg-hover" type="submit" id="button-addon1" >Out for Delivery</button>
                                                                            <button class="extra-actions-btn delete-btn grey-bg-hover" type="submit" id="button-addon1" >Delete</button>

                                                                        </div>
                                                                    </div>
                                                                                                    
                                                            </form>  
                                                        </div>
                                                    </div>
                                                        
                                                    </td>
                                                </tr>
                                                <tr >
                                                   
                                                    <td>
                                                    <span title="edfxghjgfdsasdfxgcfds1s32d" class="product-id-truncated">edfxghjgfdsasdfxgcfds1s32d</span></td>
                                                <td><span class="green-bg color-green button-2">Delivered</span></td>
                                                    <td class="">
                                                        <div class="product">
                                                            <div class="user-image-wrap">
                                                                <div class="product-avatar rounded-image-wrap">
                                                                    <span class="user-no-image rounded-image with-box-shadow white-bg color-blue">VE</span>
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="d-flex flex-column">
                                                                <h6 class="product-name  user-name-table mb-0" >Virtue Egerega</h6>
                                                                <small class="product-description-small">egeregav@gmail.com</small>
                                                            </div>
                                                        </div>
                                                        
                                                    </td>
                                                    <td class="grey-text" style="color: #6f6b7d;"><span>XMAS40</span> </td>
                                                    <td class="grey-text" style="color: #6f6b7d;"><span>₦12,212</span> </td>
                                                    
                                                    <td class="grey-text" style="color: #6f6b7d;"><span>12-12-2022</span> </td>
                                                <td class="grey-text" style="color: #6f6b7d;"><span>₦112,212</span> </td>
                                                    <td>
                                                        <div class="actions-td">
                                                        
                                                        <a href="#" class="actions-btng grey-text no-text-deco" title="view more"><i class="bi bi-eye"></i></a>
                                                        <a  role="button" class="actions-btn grey-text no-text-deco" title="more actions" onclick="document.getElementById('extra-actions').style.display = 'block'; return false"><i class="bi bi-three-dots-vertical"></i></a>
                                                        <div class="extra-actions with-box-shadow white-bg" id="extra-actions">
                                                            <div class="close-row grey-bg-hover" ><a href="#" class="actions-btn-hidden no-text-deco " title="view more">Details</a> <i class="bi bi-x" role="button"  onclick="document.getElementById('extra-actions').style.display = 'none'"></i></div>
                                                            
                                                            <form class="">
                                                                <div class="row form-row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <input type="hidden" class="form-control">
                                                                            <button class="extra-actions-btn color-blue grey-bg-hover" type="submit" id="button-addon1" >Ready For Pickup</button>
                                                                            <button class="extra-actions-btn color-green grey-bg-hover" type="submit" id="button-addon1" >Mark As Delivered</button>
                                                                            <button class="extra-actions-btn color-yellow grey-bg-hover" type="submit" id="button-addon1" >Out for Delivery</button>
                                                                            <button class="extra-actions-btn delete-btn grey-bg-hover" type="submit" id="button-addon1" >Delete</button>

                                                                        </div>
                                                                    </div>
                                                                                                    
                                                            </form>  
                                                        </div>
                                                    </div>
                                                        
                                                    </td>
                                                </tr>
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