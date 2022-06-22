
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

<div class="card-body table-responsive p-0" id="card-body">

</div>

</div>
   </div> <!--  col-md-9 -->
  </div><!--  row -->

  
</div><!--  container -->
</body>




<script>  
 $(document).ready(function(){  
      load_data();  
      function load_data(page)  
      {  
           $.ajax({  
                url:"pagination.php",  
                method:"POST",  
                data:{page:page},  
                success:function(data){  
                     $('#card-body').html(data);  
                }  
           })  
      }  
      $(document).on('click', '.pagination_link', function(){  
           var page = $(this).attr("id");  
           load_data(page);  
      });  
 });  
 </script>  

<!-- <td><img src='../image/Fixed/noRecordFound.svg'></td> -->


