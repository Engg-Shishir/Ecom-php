<?php
session_start();
include_once("../../Connection/connection.php");
$action = $_POST['actions'];
$products = array();

if(isset($_POST['productName'])){
    $pname = $_POST['productName'];
}
if(isset($_POST['productPrice'])){
    $pprice = $_POST['productPrice'];
}
if(isset($_POST['productCategory'])){
    $pcategory = $_POST['productCategory'];
}
if(isset($_POST['shipingCharge'])){
    $pscharge = $_POST['shipingCharge'];
}
if(isset($_POST['productQuantity'])){
    $pquantity = $_POST['productQuantity'];
}
if(isset($_POST['productDiscount'])){
    $pdiscount = $_POST['productDiscount'];
}
if(isset($_POST['productDetails'])){
    $pdetails = $_POST['productDetails'];
}
if(isset($_POST['sno'])){
    $sirial = $_POST['sno'];
}








$run = mysqli_query($conn,"UPDATE  product SET  name ='$pname',price ='$pprice',category ='$pcategory',details ='$pdetails',quantity ='$pquantity',discount ='$pdiscount',scharge ='$pscharge', WHERE id ='$sirial'");
if($run){
    echo "success";
}