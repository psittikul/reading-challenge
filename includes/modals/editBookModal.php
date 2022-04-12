<div class="modal" tabindex="-1" role="dialog" id="editBookModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Entry</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <?php include 'includes/form.php';?>
          <!-- <form>
              <input type='text' data-field='title' class='form-control'>
          </form> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='saveBookChangesBtn'>Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>