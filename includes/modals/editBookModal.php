<div class="modal" tabindex="-1" role="dialog" id="editBookModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Entry</h5>
        <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Existing Book</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#newBook">Add New Book</a>
            </li>
        </ul>
          <?php include 'includes/form.php';?>
          <!-- <form>
              <input type='text' data-field='title' class='form-control'>
          </form> -->
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='saveBookChangesBtn'>Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div> -->
    </div>
  </div>
</div>