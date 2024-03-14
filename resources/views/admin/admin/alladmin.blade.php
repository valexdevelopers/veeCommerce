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
                    {{-- <!-- <div class="alert {{ Session::get('message-color') }} alert-dismissible fade show" role="alert">
                        <strong>{{ Session::get('message') }}</strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div> --> --}}
                    <!-- main page wrap -->
                    <div class="main-page-wrapper">
                        <!-- main page: header wrap row  -->
                        @include('layouts.adminStickyHeader')
                        
                        <!-- main page: roles-wrap wrap row  -->
                        <section class="scroll-y">
                            

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
                                                <td>Status</td>
                                                <td>Admin</td>
                                                <td>Contact</td>
                                                <td>Products</td>
                                                <td>Invoices</td>
                                                <td>Actions</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($admins as $admin)
                                                <tr >
                                                    
                                                    <td><span title="{{ $admin->id }}" class="product-id-truncated">{{ $admin->unique_id }}</span></td>
                                                    <td>
                                                        @php
                                                            if(empty($admin->admin_verified_at)){
                                                                $status = 'Unverified';
                                                                $color = 'color-red';
                                                                $bgcolor = 'red-bg';
                                                            }else{
                                                                $status = 'Verified';
                                                                $color = 'color-green';
                                                                $bgcolor = 'green-bg';

                                                            }
                                
                                                        @endphp
                                                        
                                                        <span class="order-status {{ $bgcolor }} {{ $color }}  rounded-edges" >{{ $status}} </span> 

                                                    </td>
                                                    <td class="">
                                                        <div class="product">
                                                            <div class="user-image-wrap">
                                                                <div class="product-avatar rounded-image-wrap">
                                                                    @php
                                                                            $letter1 = Str::upper(substr($admin->firstname, 0, 1));
                                                                            $letter2 = Str::upper(substr($admin->lastname, 0, 1));
                                                                            $colors = ['color-blue', 'color-green', 'color-red', ]

                                                                    @endphp
                                                                    <span class="user-no-image rounded-image with-box-shadow white-bg {{$colors[rand(0, 2)] }}">
                                                                     
                                                                        
                                                                        {{ $letter1}}{{ $letter2}}
                                                                    </span>
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="d-flex flex-column">
                                                                <h6 class="product-name  user-name-table mb-0" >{{ $admin->firstname }} {{ $admin->lastname }}</h6>
                                                                <small class="product-description-small">{{ $admin->email }}</small>
                                                            </div>
                                                        </div>
                                                        
                                                    </td>
                                                    <td class="grey-text" style="color: #6f6b7d;"><span>{{ $admin->phone }}</span> </td>
                                                    <td class="grey-text" style="color: #6f6b7d;"><span>{{ $admin->adminProduct->count() }}</span> </td>
                                                    <td class="grey-text"><span>12,212</span> </td>
                                                
                                                    <td>
                                                        <div class="actions-td">
                                                            @empty($admin->admin_verified_at)
                                                                <a href="{{ route('admin.admin.verify', $admin_id = $admin->id) }}" class="actions-btn grey-text no-text-deco" title="Activate admin"><i class="bi bi-check2-circle color-blue" ></i></a>
                                                            @else
                                                                <a href="{{ route('admin.admin.unverify', $admin_id = $admin->id) }}" class="actions-btn grey-text no-text-deco" title="Restrict admin"><i class="bi bi-dash-circle color-red"></i></a>
                                                            @endempty
                                                            
                                                            <a  role="button" class="actions-btn grey-text no-text-deco" title="more actions" onclick="document.getElementById('extra-actions-{{ $admin->unique_id }}').style.display = 'block'; return false"><i class="bi bi-three-dots-vertical"></i></a>
                                                            <div class="extra-actions with-box-shadow white-bg" id="extra-actions-{{ $admin->unique_id }}">
                                                            @empty($admin->admin_verified_at)
                                                            <div class="close-row grey-bg-hover" ><a href="{{ route('admin.admin.verify', $admin_id = $admin->id) }}" class="actions-btn-hidden no-text-deco " title="Activate Admin">Activate Admin</a> <i class="bi bi-x" role="button"  onclick="document.getElementById('extra-actions-{{ $admin->unique_id }}').style.display = 'none'"></i></div>
                                                            @else
                                                            <div class="close-row grey-bg-hover" ><a href="{{ route('admin.admin.unverify', $admin_id = $admin->id) }}" class="actions-btn-hidden no-text-deco " title="Restrict Admin">Restrict Admin</a> <i class="bi bi-x" role="button"  onclick="document.getElementById('extra-actions-{{ $admin->unique_id }}').style.display = 'none'"></i></div>
                                                            @endempty

                                                            <div><a href="{{ route('admin.admin.upgrade', $admin_id = $admin->id) }}" class="actions-btn-hidden no-text-deco grey-bg-hover" title="Make SuperAdmin">Make SuperAdmin</a></div>
                                                            <form method="post" action="{{ route('admin.admin.delete') }}">
                                                                @method('delete')
                                                                @csrf
                                                                <div class="row form-row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <input type="hidden" value="{{ $admin->id }}" name="admin_id" />
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
                                                    {{$admins->links()}}
                                                </ul>
                                                </nav>
                                        </div>
                                    </div>
                                </div>
                    
                            </div>
                            <!-- extra details for notification ends here, available on click -->
                            @include('layouts.adminNotification')
                            <!-- extra details for profile, available on click -->
                            

                            @include('layouts.adminProfile')
                            <!-- extra details for profile ends here, available on click -->
                        </section>
                    </div>

        @include('layouts.adminFooter') 
    </body>
    
</html>