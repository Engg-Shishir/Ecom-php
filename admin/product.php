
<?php 
$title = "Admin | Product";
?>



<link rel="stylesheet" href="../css/adminlte.min.css">
<link rel="stylesheet" href="./css/product-insert-modal.css">


<body>

<div class="container">
<div class="row mt-3">
    <!-- Sidebar -->
    <div class="col-12 col-md-3">
       <?php include_once"./layout/sidebar.php"; ?>
    </div>
    <div class="col-12 col-md-9">
      <?php include_once"./component/inserProductModal.php"; ?>
      <div class="card">
          <div class="card-header bg-dark">
            <div class="row">
              <div class="col-md-6">
                <div class="d-flex align-items-center" >
                    <button type="button" class="btn btn-light" data-bs-toggle="modal"   data-bs-target="#exampleModal"><i class="fas fa-plus"></i></button>
                    <select class="ml-3 form-select form-select-sm" style="width:100px;" id="product_show_by_limit">
                      <option value="5">5</option>
                      <option value="10">10</option>
                      <option value="25">25</option>
                      <option value="50">50</option>
                      <option value="100">100</option>
                      <option value="all">All</option>
                    </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="d-flex align-items-center justify-content-end">
                    <div id="searchSpiner" class="spinner-border spinner-border-md mr-2"role="status" style="opacity:0;"></div>
                    <div class="input-group input-group-sm" style="width: 250px;">
                        <input type="text" id="search_box" class="form-control float-right" placeholder="Search">
                        <div class="input-group-append">
                          <button type="submit" class="btn btn-light" id="product_search_btn">
                            <i class="fas fa-search"></i>
                          </button>
                        </div>
                    </div>
                </div>
              </div>
            </div>
           </div>

          <div class="card-body table-responsive p-0" id="dynamic_content">
              <table class="table table-bordered table-striped table-hover table-head-fixed text-nowrap">
                    <thead>
                      <tr>
                        <th style="text-align:center;">Image</th>
                        <th style="text-align:center;">Name</th>
                        <th style="text-align:center;">Price</th>
                        <th style="text-align:center;">Category</th>
                        <th style="text-align:center;">Quantity</th>
                        <th style="text-align:center;">Discount</th>
                        <th style="text-align:center;">Shiping Charge</th>
                        <th style="text-align:center;">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot class="bg-dark">
                      <tr>
                        <th  style="text-align:center;">Image</th>
                        <th  style="text-align:center;">Name</th>
                        <th  style="text-align:center;">Price</th>
                        <th  style="text-align:center;">Category</th>
                        <th  style="text-align:center;">Quantity</th>
                        <th  style="text-align:center;">Discount</th>
                        <th  style="text-align:center;">Shiping Charge</th>
                        <th  style="text-align:center;">Action</th>
                      </tr>
                    </tfoot>
              </table>

              <div id="link" class="d-flex align-items-center justify-content-around mt-3">

              </div>
          </div>
      </div>
   </div> <!--  col-md-9 -->
  </div><!--  row -->

  
</div><!--  container -->
</body>

<script src="js/product.js"></script>

<!-- <td><img src='../image/Fixed/noRecordFound.svg'></td> -->


