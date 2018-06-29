<!-- Modal Customer -->
<div id="myModalDestroy" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      <p class="modal-title fa fa-trash-o">&nbsp;&nbsp;Delete Customer</p>
      </div>
      <div class="modal-body">
      <input type="hidden" name="destroy-customer-id" class="form-control">
        <div class="form-group">
            <label for="customer">Customer :</label>
            <input type="text" name="destroy-customer" class="form-control" id="customer" disabled>
        </div>      
      <div class="modal-footer">
        <button type="button" class="btn btn-danger destroy-modal-customer"><i class="fa fa-save"></i> Delete</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
      </div>
    </div>

  </div>
</div>
<!-- End Modal Customer -->