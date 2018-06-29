<!-- Modal Customer -->
<div id="myModalCreate" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      <p class="modal-title fa fa-plus">&nbsp;&nbsp;New Customer</p>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label for="customer">Customer :</label>
            <input type="text" name="customer" class="form-control" id="customer">
        </div>
        <div class="form-group">
            <label for="customer">Gender :</label>
            <select name="gender" id="gender" class="form-control">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>
        <div class="form-group">
            <label for="telephone">Telephone :</label>
            <input type="text" name="telephone" class="form-control" id="telephone">
        </div>
        <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" name="email" class="form-control" id="email">
        </div>
        <div class="form-group">
            <label for="address">Address :</label>
            <textarea name="address" id="address"  class="form-control" cols="10" rows="3"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary save-customer"><i class="fa fa-save"></i> Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
      </div>
    </div>

  </div>
</div>
<!-- End Modal Customer -->