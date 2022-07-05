

<!-- Modal -->
<div class="modal fade" data-bs-backdrop="static" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header text-center bg-dark text-light">
        <h5 class="modal-title text-light" id="exampleModalLabel">Insert Product</h5>
        <!-- <button type="button" class="btn btn-sm text-light"  >
           X
        </button> -->
        <button type="button" class="btn btn-sm btn-light" data-bs-dismiss="modal"> X </button>
      </div>
      <div class="modal-body" id="productInsert">
            <form class="form-login" id="product">
                <div class="row">
                  <div class="col-md-4"></div>
                  <div class="col-md-4">
                    <img id="productInsertImagePreview" data-name="" src="" alt="" height="250px" width="250px" style="display:none;" >
                  </div>
                  <div class="col-md-4"></div>
                </div>
                
                <div class="form-group d-flex align-items-center justify-content-center my-2">
                    <div class="loader"  style="border: 10px solid #f3f3f3;border-radius: 50%;border-top: 7px solid black;border-bottom: 7px solid red;width: 40px;height: 40px;-webkit-animation: spin 2s linear infinite; animation: spin 2s linear infinite; opacity:0; display:none;"></div>
                </div> 
                <div class="row mt-3">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="pname">Name:</label>
                        <input type="text" class="form-control" placeholder="Product name" id="pname" />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group ">
                        <label for="pprice">Price:</label>
                        <input type="number" class="form-control" placeholder="Product price" id="pprice" />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                      <div class="form-group ">
                            <label for="pcategory">Category:</label>
                            <select class="form-control" id="pcategory">
                              <option>Select Category</option>
                              <option>Device</option>
                              <option>Paper</option>
                              <option>Watch</option>
                              <option>Aci</option>
                            </select>
                      </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                          <label for="shipingCharge">Shiping Charage:</label>
                          <select class="form-control" id="shipingCharge">
                            <option>Select Shipping Charge</option>
                            <option>Free</option>
                            <option>20</option>
                            <option>35</option>
                            <option>50</option>
                          </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group ">
                        <label for="pquantity">Quantity:</label>
                        <input type="number" class="form-control" placeholder="Product quantity" id="pquantity" />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group ">
                        <label for="pdiscount">Discount:</label>
                        <input type="number" class="form-control" placeholder="Product discount" id="pdiscount" />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group ">
                        <label for="pdetails">Product Details:</label>
                        <!-- <textarea placeholder="Product Details" id="pdetails" class="form-control"></textarea> -->
                        <textarea name="specs" id="summernote""></textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                          <div class="custom-file">
                              <input type="file" class="custom-file-input" id="product_photo_choser" placeholder="hello">
                              <label class="custom-file-label" for="customFile">Product Image</label>
                          </div>
                      </div>
                  </div>
                </div>
                <div class="form-group d-flex align-items-center justify-content-end mt-3">
                    <button type="button" class="btn btn-dark" id="insert_btn_product">Insert
                    </button> 
                </div> 
            </form>
      </div>
    </div>
  </div>
</div>