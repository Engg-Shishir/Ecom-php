

<!-- Modal -->
<div class="modal fade" data-backdrop="static" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-focus="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header text-center bg-dark text-light">
        <h5 class="modal-title text-light" id="exampleModalLabel">Insert Product</h5>
        <!-- <button type="button" class="btn btn-sm text-light"  >
           X
        </button> -->

        <button type="button" class="btn btn-danger shadow" data-dismiss="modal">
           <i class="fas fa-minus"></i>
        </button>
      </div>
      <div class="modal-body" id="productInsert">
            <form class="form-login" id="product">
                <div class="form-group d-flex align-items-center justify-content-center my-2">
                    <div class="loader"  style="border: 10px solid #f3f3f3;border-radius: 50%;border-top: 7px solid black;border-bottom: 7px solid red;width: 40px;height: 40px;-webkit-animation: spin 2s linear infinite; animation: spin 2s linear infinite; opacity:0; display:none;"></div>
                </div> 
                <div class="row my-auto  mt-3">
                  <div class="col-md-12">
                    <!-- <div class="form-group">
                          <div class="custom-file">
                              <input type="file" class="custom-file-input" id="product_photo_choser" placeholder="hello">
                              <label class="custom-file-label" for="customFile">Product Image</label>
                          </div>
                      </div> -->
                      <input type="hidden" name="id" id="id" value="">
                      <div class="form-group">
                          <label for="" class="control-label">Images</label>
                          <div class="custom-file">
                              <input type="file" class="custom-file-input rounded-circle" id="customFile" name="images[]" multiple="" onchange="displayImg(this)">
                              <label class="custom-file-label" for="customFile">Choose file</label>
                          </div>
                			</div>
                  </div>
                  <!-- <div class="col-md-2">
                    <img id="productInsertImagePreview" data-name="" src="" alt="" height="100px" width="100px" style="display:none;" >
                  </div> -->
                </div>
                <div class="row">
                  <div class="col-md-12">
                      <div class="d-flex align-items-center justify-content-center" id="preview"> 
                         <!-- Image preview -->
                      </div>
                  </div>
                </div>
                <div class="row">
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
                    <div class="form-group">
                            <label for="shipingCharge">Category :</label>
                            <select class="select2" id="pcategory">
                              <option></option>
                              <option>Electric</option>
                              <option>Electronics</option>
                              <option>Education</option>
                              <option>Cloth</option>
                              <option>Food</option>
                              <option>Gamming</option>
                              <option>Medicine</option>
                              <option>Cosmatics</option>
                            </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                          <label for="shipingCharge">Shiping Charage:</label>
                          <select class="form-control select2" id="shipingCharge">
                            <option class="mb-1 place"></option>
                            <option>Free</option>
                            <option>20</option>
                            <option>35</option>
                            <option>50</option>
                            <option>100</option>
                            <option>200</option>
                            <option>300</option>
                            <option>400</option>
                            <option>500</option>
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
                        <textarea name="specs" id="summernote" class="form-control"></textarea>
                    </div>
                  </div>
                </div>
                <!-- <div class="row">
                  <div class="col-md-4 offset-4">
                    <img id="productInsertImagePreview" data-name="" src="" alt="" height="150px" width="150px" style="display:none;" >
                  </div>
                </div> -->
                <div class="form-group d-flex align-items-center justify-content-end mt-3">
                    <button type="button" class="btn btn-dark" id="insert_btn_product">Insert
                    </button> 
                    <!-- <button type="submit" class="btn btn-dark" id="insert_btn_product">Insert
                    </button>  -->
                  <button type="button" class="btn btn-danger shadow ml-1" data-dismiss="modal">
                    Close
                  </button>
                </div> 
            </form>
      </div>
    </div>
  </div>
</div>