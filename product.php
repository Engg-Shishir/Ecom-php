<?php
session_start();
include_once("./Connection/connection.php");
?>


<!DOCTYPE html>
<html lang="Eng">

<head>
    <!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='copyright' content=''>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Eshop Ecommerce</title>

    <?php include_once "./Asset/Component/css.php"; ?>

</head>

<body class="js">
    <?php include_once "./Asset/Component/topbar.php"; ?>
    <?php include_once "./Asset/Component/productDetails.php"; ?>
    <?php include_once "./Asset/Component/footer.php"; ?>

</body>
<?php include_once "./Asset/Component/js.php"; ?>

</html>