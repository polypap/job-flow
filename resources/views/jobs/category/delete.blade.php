<div class="modal" tabindex="-1" id="deleteCategory">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Your are about to delete a category. Are you sure you want to proceed with this action?</p>
      </div>
      <div class="modal-footer">
        <form method="post", action="" id="deleteForm">
          @csrf
          @method('delete')
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" id="confirmDelete" class="btn btn-danger">Yes, Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>