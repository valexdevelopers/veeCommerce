<!-- extra details for profile, available on click -->
<div class="extra-details with-box-shadow white-bg" id="extra-details">
    <div class="header-profile">
        <div><img class="user-image" src="{{asset('admincontent/images/avatars/avartar-user.jpg') }}"></div>
        <div>
            <p class="user-name">{{ Auth::guard('admin')->user()->firstname}} {{ Auth::guard('admin')->user()->lastname}}</p>
            <p class="user-role">
                @if(Auth::guard('admin')->user()->isSuperAdmin == 1)
                Super Admin

                @else Admin @endif
            </p>
        </div>
        <div class="close-extra" role="button" onclick="document.getElementById('extra-details').style.display = 'none'">
            <i class="bi bi-x "></i>
        </div>
    </div>
    <div><a href="{{ route('admin.profile') }}" class="details-btn-hidden no-text-deco grey-bg-hover" title="view more"><i class="bi bi-person-check"></i>&nbsp;&nbsp;&nbsp;My Profile</a></div>
    <div><a href="{{ route('admin.profile') }}" class="details-btn-hidden no-text-deco grey-bg-hover" title="view more"><i class="bi bi-gear"></i>&nbsp;&nbsp;&nbsp;Setting</a></div>
    <form class="">
        <div class="row form-row">
            <div class="col-sm-12">
                <div class="form-group">
                    <input type="hidden" class="form-control">
                    <button class="extra-details-btn delete-btn grey-bg-hover" type="submit" id="button-addon1"> <i class="bi bi-box-arrow-right"></i>&nbsp;&nbsp;&nbsp;Logout</button>

                </div>
            </div>
                                            
    </form>  
</div>