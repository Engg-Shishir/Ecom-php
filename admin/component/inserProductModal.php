

<!-- Modal -->
<div class="modal fade" data-bs-backdrop="static" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title" id="exampleModalLabel">Insert Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <form class="form-login" id="product">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Product name" id="pname" />
                </div>
                <div class="form-group mt-2">
                    <input type="number" class="form-control" placeholder="Product price" id="pprice" />
                </div>
                <div class="form-group mt-2">
                      <select class="form-control" id="shipingCharge">
                        <option>Select Category</option>
                        <option>Free</option>
                        <option>20</option>
                        <option>35</option>
                        <option>50</option>
                      </select>
                </div>
                <div class="form-group mt-2">
                    <textarea placeholder="Product Details" id="pdetails" class="form-control"></textarea>
                </div>
                <div class="form-group mt-2">
                    <input type="number" class="form-control" placeholder="Product quantity" id="pquantity" />
                </div>
                <div class="form-group mt-2">
                    <input type="number" class="form-control" placeholder="Product discount" id="pdiscount" />
                </div>
                <div class="form-group mt-2">
                      <select class="form-control" id="shipingCharge">
                        <option>Select Shipping Charge</option>
                        <option>Free</option>
                        <option>20</option>
                        <option>35</option>
                        <option>50</option>
                      </select>
                </div>
                <div class="form-group">
                      <div class="custom-file">
                          <input type="file" class="custom-file-input" id="customFile">
                          <label class="custom-file-label" for="customFile">Choose file</label>
                      </div>
                  </div>
                <div class="form-group d-flex align-items-center justify-content-between mt-3">
                    <button type="button" class="btn btn-dark" id="insert_btn_product">Insert
                    </button> 
                    
                    <div class="loader"  style="border: 10px solid #f3f3f3;border-radius: 50%;border-top: 7px solid black;border-bottom: 7px solid red;width: 40px;height: 40px;-webkit-animation: spin 2s linear infinite; animation: spin 2s linear infinite; opacity:0;"></div>
                </div> 
            </form>
      </div>
    </div>
  </div>
</div>