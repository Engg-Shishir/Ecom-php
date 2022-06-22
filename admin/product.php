
<?php 
$title = "Admin | Product";
?>



<link rel="stylesheet" href="../css/adminlte.min.css">
<link rel="stylesheet" href="./css/product-insert-modal.css">


<body>

<div class="container">
<div class="row mt-3">
    <!-- Sidebar -->
    <div class="col-md-3">
       <?php include_once"./layout/sidebar.php"; ?>
    </div>
    <div class="col-md-9">
      <?php include_once"./component/inserProductModal.php"; ?>
      <div class="card">
          <div class="card-header bg-dark">
                  <button type="button" class="btn btn-light" data-bs-toggle="modal"   data-bs-target="#exampleModal"><i class="fas fa-plus"></i></button>
              <div class="card-tools mt-1 d-flex  align-items-center justify-content-between">
                <div id="searchSpiner" class="spinner-border spinner-border-md mr-2" role="status" style="display:none;"></div>
                  <div class="input-group input-group-sm" style="width: 250px;">
                      <input type="text" id="table-search" class="form-control float-right" placeholder="Search">
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-light" id="product_search_btn">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                  </div>
               </div>
            </div>

<div class="card-body table-responsive p-0">
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
</div>

</div>
   </div> <!--  col-md-9 -->
  </div><!--  row -->

  
</div><!--  container -->
</body>


<script>
$(function () {
    $("#example1").DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true, 
      "autoWidth": false,
      "responsive": true, 
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');



});
</script>

<script src="./js/product.js"></script>

<!-- <td><img src='../image/Fixed/noRecordFound.svg'></td> -->


