

<!-- Modal -->
<div class="modal fade" data-bs-backdrop="static" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title" id="exampleModalLabel">Insert Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="productInsert">
            <form class="form-login" id="product">
                <div class="row">
                  <div class="col-md-4"></div>
                  <div class="col-md-4">
                    <img id="productInsertImagePreview" src="" alt="" height="250px" width="250px" style="display:none;" >
                  </div>
                  <div class="col-md-4"></div>
                </div>
                <div class="row mt-3">
                  <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Product name" id="pname" />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group ">
                        <input type="number" class="form-control" placeholder="Product price" id="pprice" />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                      <div class="form-group ">
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
                        <input type="number" class="form-control" placeholder="Product quantity" id="pquantity" />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group ">
                        <input type="number" class="form-control" placeholder="Product discount" id="pdiscount" />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group ">
                        <textarea placeholder="Product Details" id="pdetails" class="form-control"></textarea>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                          <div class="custom-file">
                              <input type="file" class="custom-file-input" id="product_photo_choser">
                              <label class="custom-file-label" for="customFile">Choose file</label>
                          </div>
                      </div>
                  </div>
                </div>
                <div class="form-group d-flex align-items-center justify-content-between mt-3">
                    
                    <div class="loader"  style="border: 10px solid #f3f3f3;border-radius: 50%;border-top: 7px solid black;border-bottom: 7px solid red;width: 40px;height: 40px;-webkit-animation: spin 2s linear infinite; animation: spin 2s linear infinite; opacity:0;"></div>

                    <button type="button" class="btn btn-dark" id="insert_btn_product">Insert
                    </button> 
                </div> 
            </form>
      </div>
    </div>
  </div>
</div>