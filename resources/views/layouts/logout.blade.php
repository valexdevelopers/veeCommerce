<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Confirm Logout</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        Are you sure you want to logout ?
        </div>
        <div class="modal-footer">
          <form  method="post" action="{{ route('logout') }}">
            @csrf
           <input type="hidden" name="logout" value="confirmedLogout" />
          
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit"  class="btn btn-primary" name="endsession">Logout</button>
          </form>
        </div>
      </div>
    </div>
  </div>