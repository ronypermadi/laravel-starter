<div class="modal fade" id="scrollable-modal" tabindex="-1" role="dialog"
aria-labelledby="scrollableModalTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="scrollableModalTitle">List User</h5>
        <button type="button" class="close" data-dismiss="modal"
            aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="card-header-form">
            <div class="input-group">
              <input type="text" id="autocomplete_searchUser" name="search" class="form-control" placeholder="Search">
              <div class="input-group-btn">
                <button class="btn btn-primary btn-icon"><i class="fas fa-search"></i></button>
              </div>
            </div>
          </form>
        <br>
        <ul class="list-unstyled list-unstyled-border">
            <div class="listUser">
                
            </div>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>