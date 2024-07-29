<div class="modal" tabindex="-1" id="cancelApplication">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cancel Job Application</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h5 id="modalJobTitle" class="fw-bold"></h5>
        <p>Are you sure you want to cancel your application for above job?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <form action="" method="post" id="appCancelForm">
          @csrf
          @method('delete')
          <button type="submit" id="confirmDelete" class="btn btn-danger">Yes, Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>