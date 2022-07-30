<?php 
    session_start();
    include_once("../Layout/header.php");
    include_once("../Connection/connection.php");
    if(isset($_SESSION['user_session'])){
      header("location: page/dashboard.php");
    }else{
        header("location: page/login.php");
    }
?>