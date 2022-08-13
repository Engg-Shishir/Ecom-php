<?php
session_start();
if (!isset($_SESSION['user_session'])) {
  header("location: ../index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php
  $title = "User | Dashboard";
  include_once("../Asset/Link/css.php");
  ?>
</head>

<body>


  <div class="containers">
    <div class="wrapper">
      <?php include_once("../Component/navBar.php");  ?>
      <?php include_once("../Component/sideBar.php");  ?>

      <div class="content-wrapper">
        <section class="content">
        </section>
      </div>
    </div>
  </div>
  </div>

</body>
<?php include_once("../Asset/Link/js.php"); ?>
<script src="../Asset/js/userDashboardAction.js"></script>

</html>