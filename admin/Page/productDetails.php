
<?php 

    session_start();
    include_once("../../Connection/connection.php");
    $title = "Admin | Details"; 
    include_once("../Layout/header.php");
    if(!isset($_SESSION['user_session'])){
      header("location: login.php");
    }
?>

<!-- <link rel="stylesheet" href="../Asset/zoom/css/normalize.css" />
<link rel="stylesheet" href="../Asset/zoom/css/foundation.css" />
<link rel="stylesheet" href="../Asset/zoom/css/demo.css" /> -->
<script src="../Asset/zoom/js/vendor/jquery.js"></script>


  <!-- xzoom plugin here -->
  <script type="text/javascript" src="../Asset/zoom/dist/xzoom.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../Asset/zoom/dist/xzoom.css" media="all" /> 


  <link type="text/css" rel="stylesheet" media="all" href="../Asset/zoom/fancybox/source/jquery.fancybox.css" />
  <script type="text/javascript" src="../Asset/zoom/fancybox/source/jquery.fancybox.js"></script>

  <link type="text/css" rel="stylesheet" media="all" href="../Asset/zoom/magnific-popup/css/magnific-popup.css" />
  <script type="text/javascript" src="../Asset/zoom/magnific-popup/js/magnific-popup.js"></script>       

  <script src="../Asset/zoom/js/productDetailsPageSetup.js"></script>
</head>

<body>
<div class="containers">
    <div class="wrapper">
      <?php  include_once("../Layout/navBar.php");  ?>
      <?php  include_once("../Layout/sideBar.php");  ?>
      <div class="content-wrapper">
        <section id="fancy">
           <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="xzoom-container pt-2">
                  <img class="xzoom4" id="xzoom-fancy" src="../Asset/zoom/images/gallery/preview/01_b_car.jpg" xoriginal="../Asset/zoom/images/gallery/original/01_b_car.jpg" />

                  <div class="xzoom-thumbs mt-2">
                    <a href="../Asset/zoom/images/gallery/original/01_b_car.jpg"><img class="xzoom-gallery4" width="80" src="../Asset/zoom/images/gallery/preview/01_b_car.jpg"  xpreview="../Asset/zoom/images/gallery/preview/01_b_car.jpg" title="The description goes here"></a>

                    <a href="../Asset/zoom/images/gallery/original/02_o_car.jpg"><img class="xzoom-gallery4" width="80" src="../Asset/zoom/images/gallery/preview/02_o_car.jpg" title="The description goes here"></a>

                    <a href="../Asset/zoom/images/gallery/original/03_r_car.jpg"><img class="xzoom-gallery4" width="80" src="../Asset/zoom/images/gallery/preview/03_r_car.jpg" title="The description goes here"></a>

                    <a href="../Asset/zoom/images/gallery/original/04_g_car.jpg"><img class="xzoom-gallery4" width="80" src="../Asset/zoom/images/gallery/preview/04_g_car.jpg" title="The description goes here"></a>

                  </div>
                </div> 
              </div>
            </div>
           </div>
        </section> 
      </div>
    </div>
  </div>
</body>
<script src="../Asset/js/Dashboard.js"></script>
</html>


 