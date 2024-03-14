<div class="rows header-row sticky-row with-box-shadow">
    <div class="lg-nodisplay menu-btn-wrap" id="menu-open-button">
        <button class="menu-open-button" role="button" onclick="document.getElementById('menu_wrapper').style.display = 'block'"><i class="bi bi-list"></i> </button>
    </div>
    <div class="brand">
        <img class="logo" src="{{asset('admincontent/images/logo/logo.png') }}" alt="brand logo" title="logo">
    </div>
    <div >
        <form class="header-search-form">
            <div class="input-group ">
                <input type="text" class="form-control search-input" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                <button class="search-btn darkblue-bg color-cream" type="submit" id="button-addon1"><i class="bi bi-search search-btn"></i></button>
              </div>                                      
        </form>
    </div>
    <div class="avatar-notification-wrap">
        <div class="notifications" role="button" onclick="document.getElementById('notification-wrap').style.display = 'block'"><i class="bi bi-bell"></i><span class="notification-count darkblue-bg color-cream">5</span></div>

        <div class="profile-details" role="button" onclick="document.getElementById('extra-details').style.display = 'block'"><img class="user-image" src="{{asset('admincontent/images/avatars/avartar-user.jpg') }}" ></div>
    </div>
    
</div>