
<?php 

session_start();
    $title = "Admin | Dashboard";
    include_once("../Layout/header.php");
    include_once("../../Connection/connection.php");
    if(!isset($_SESSION['user_session'])){
      header("location: login.php");
    }
?>


<link rel="stylesheet" href="css/profilepage.css">
<body>  
<div class="containers">
    <div class="wrapper">
      <?php  include_once("../Layout/navBar.php");  ?>
      <?php  include_once("../Layout/sideBar.php");  ?>
    <div class="content-wrapper">

    </div>
    </div>
  </div>
</div>
</body>
<script src="../Asset/js/Dashboard.js"></script>
</html>
