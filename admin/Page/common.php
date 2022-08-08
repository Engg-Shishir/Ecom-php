<?php
session_start();
$title = "Admin | Common";
include_once("../../Connection/connection.php");
include_once("../Layout/header.php");
if (!isset($_SESSION['user_session'])) {
  header("location: login.php");
}
?>

</head>

<body>
  <div class="containers">
    <div class="wrapper">
      <?php include_once("../Layout/navBar.php");  ?>
      <?php include_once("../Layout/sideBar.php");  ?>
      <div class="content-wrapper">
      </div>
    </div>
  </div>
</body>
<script src="../Asset/js/Dashboard.js"></script>

</html>