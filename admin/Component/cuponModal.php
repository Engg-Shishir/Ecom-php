<div class="modal fade" data-backdrop="static" id="exampleModal"  aria-modal="true" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content rounded-0">
        <div class="modal-header text-right">
            <h5 class="modal-title text-right" id="exampleModalLabel">.......</h5>
        </div>
        <div class="modal-body" id="productInsert">
            <form action="" id="cupon-form">
                <input type="hidden" name="id" value="">
                <div class="form-group">
                    <label for="cuponName" class="control-label">Cupon Name</label>
                    <input type="text" id="cuponName" class="form-control form-control-sm rounded-0" value="">
                </div>
                <div class="form-group">
                    <label for="cuponDiscount" class="control-label">Discount</label>
                    <input type="number" id="cuponDiscount" class="form-control form-control-sm rounded-0" value="">
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="cuponModalActionBtn">Save</button>

            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
    </div>
  </div>
</div>