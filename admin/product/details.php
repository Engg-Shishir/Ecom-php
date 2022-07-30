
<?php 
    include_once("../../component/connection/connection.php");
    $title = "Admin | Details";
   
?>


<?php   
  include_once("../layout/productHeader.php");
?>

<link rel="stylesheet" href="../zoom/css/normalize.css" />
<link rel="stylesheet" href="../zoom/css/foundation.css" />
<link rel="stylesheet" href="../zoom/css/demo.css" />
<script src="../zoom/js/vendor/modernizr.js"></script>
<script src="../zoom/js/vendor/jquery.js"></script>


  <!-- xzoom plugin here -->
  <script type="text/javascript" src="../zoom/dist/xzoom.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../zoom/dist/xzoom.css" media="all" /> 


  <link type="text/css" rel="stylesheet" media="all" href="../zoom/fancybox/source/jquery.fancybox.css" />
  <link type="text/css" rel="stylesheet" media="all" href="../zoom/magnific-popup/css/magnific-popup.css" />
  <script type="text/javascript" src="../zoom/fancybox/source/jquery.fancybox.js"></script>
  <script type="text/javascript" src="../zoom/magnific-popup/js/magnific-popup.js"></script>       

  <script src="../zoom/js/setup.js"></script>
</head>

<body>
<div class="containers">
    <div class="wrapper">
      <?php  include_once("../component/navBar.php");  ?>
      <?php  include_once("../component/sideBar.php");  ?>
      <div class="content-wrapper">
    <!-- fancy start -->
    <section id="fancy">
    <div class="row">
      <div class="large-5 column">
        <div class="xzoom-container">
          <img class="xzoom4" id="xzoom-fancy" src="../zoom/images/gallery/preview/01_b_car.jpg" xoriginal="../zoom/images/gallery/original/01_b_car.jpg" />

          <div class="xzoom-thumbs mt-2">
            <a href="../zoom/images/gallery/original/01_b_car.jpg"><img class="xzoom-gallery4" width="80" src="../zoom/images/gallery/preview/01_b_car.jpg"  xpreview="../zoom/images/gallery/preview/01_b_car.jpg" title="The description goes here"></a>

            <a href="../zoom/images/gallery/original/02_o_car.jpg"><img class="xzoom-gallery4" width="80" src="../zoom/images/gallery/preview/02_o_car.jpg" title="The description goes here"></a>

            <a href="../zoom/images/gallery/original/03_r_car.jpg"><img class="xzoom-gallery4" width="80" src="../zoom/images/gallery/preview/03_r_car.jpg" title="The description goes here"></a>

            <a href="../zoom/images/gallery/original/04_g_car.jpg"><img class="xzoom-gallery4" width="80" src="../zoom/images/gallery/preview/04_g_car.jpg" title="The description goes here"></a>

          </div>
        </div>          
      </div>
    </div>
    </section> 
      </div>
    </div>
  </div>
</body>
</html>


 