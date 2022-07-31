



<div class="modal fade" data-backdrop="static" id="exampleModal"  aria-modal="true" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header text-right">
            <h5 class="modal-title text-right" id="exampleModalLabel">Insert Product</h5>
        </div>
        <div class="modal-body" id="productInsert">
            <form action="" id="category-form">
                <input type="hidden" name="id" value="">
                <div class="form-group">
                    <label for="category" class="control-label">Category Name</label>
                    <input type="text" name="category" id="category" class="form-control form-control-sm rounded-0" value="">
                </div>
                <div class="form-group">
                    <label for="description" class="control-label">Description</label>
                    <textarea name="description" id="" cols="30" rows="2" class="form-control form-control-sm rounded-0 no-resize"></textarea>
                </div>
                <div class="form-group">
                    <label for="status" class="control-label">Status</label>
                    <select name="status" id="status" class="form-control form-control-sm rounded-0">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                    </select>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="submit" onclick="$('#uni_modal form').submit()">Save</button>

            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
    </div>
  </div>
</div>



<!-- <script>
	$(document).ready(function(){
		$('#category-form').submit(function(e){
			e.preventDefault();
            var _this = $(this)
			 $('.err-msg').remove();
			start_loader();
			$.ajax({
				url:_base_url_+"classes/Master.php?f=save_category",
				data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                dataType: 'json',
				error:err=>{
					console.log(err)
					alert_toast("An error occured",'error');
					end_loader();
				},
				success:function(resp){
					if(typeof resp =='object' && resp.status == 'success'){
						location.reload()
					}else if(resp.status == 'failed' && !!resp.msg){
                        var el = $('<div>')
                            el.addClass("alert alert-danger err-msg").text(resp.msg)
                            _this.prepend(el)
                            el.show('slow')
                            $("html, body").animate({ scrollTop: _this.closest('.card').offset().top }, "fast");
                            end_loader()
                    }else{
						alert_toast("An error occured",'error');
						end_loader();
                        console.log(resp)
					}
				}
			})
		})
})
</script> -->