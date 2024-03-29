<?php
session_start();
$title = "Admin | Product";
include_once("../Layout/header.php");
include_once("../../Connection/connection.php");
if (!isset($_SESSION['user_session'])) {
  header("location: login.php");
}
?>
</head>
<!-- <link rel="stylesheet" href="css/profilepage.css"> -->

<body>
  <div class="containers">
    <div class="wrapper">
      <!-- Navbar -->
      <?php include_once("../Layout/navBar.php");  ?>
      <!-- Main Sidebar Container -->
      <?php include_once("../Layout/sideBar.php");  ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Main content -->
        <section class="content pt-2">
          <div class="card shadow">
            <div class="card-header ">
              <div class="row">
                <div class="col-md-6">
                  <div class="d-flex align-items-center">
                    <button id="show_insert_modal_btn" type="button" class="btn btn-default shadow" data-toggle="modal" data-target="#exampleModal" data-backdrop="static"><i class="fas fa-plus"></i></button>

                    <select class="ml-3 form-select form-select-sm shadow" style="width:100px;" id="product_show_by_limit">
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
                    <div id="searchSpiner" class="spinner-border spinner-border-md mr-2" role="status" style="opacity:0;"></div>
                    <div class="input-group input-group-sm" style="width: 250px;">
                      <input type="text" id="search_box" class="form-control float-right shadow" placeholder="Search">
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default" id="product_search_btn">
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
                <tfoot class="">
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
                </tfoot>
              </table>

              <div id="link" class="d-flex align-items-center justify-content-around mt-3 shadow">

              </div>
            </div>
          </div>
          <?php include_once "../Component/inserProductModal.php"; ?>
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
    </div>
  </div>
  </div>
</body>
<script src="../Asset/js/Dashboard.js"></script>
<script src="../Asset/js/product.js"></script>
<script type="text/javascript">
  google_ad_client = "ca-pub-2783044520727903";
  google_ad_slot = "2780937993";
  google_ad_width = 728;
  google_ad_height = 90;
</script>
</html>