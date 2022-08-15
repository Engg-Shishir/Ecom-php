<?php
include_once("../../Connection/connection.php");


session_start(); 


// Get current url
$currentUrl = $_SERVER["REQUEST_URI"];
// Remove / from url : trim($currentUrl,"/");
// $currentPageName = basename($currentUrl);

if(!isset($_SESSION['user_session'])){
   echo "Should login first";
   
}

?>