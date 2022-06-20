
<?php 
$title = "Admin | Product";
?>



<link rel="stylesheet" href="../css/adminlte.min.css">


<body>

<div class="container">
<div class="row mt-3">
    <!-- Sidebar -->
    <div class="col-md-3">
       <?php include_once"./layout/sidebar.php"; ?>
    </div>
    <div class="col-md-9">
      <div class="card">
         <div class="card-header">
         <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>
         </div>
           
         <div class="card-body">
           <?php include_once"./component/inserProductModal.php"; ?>
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


