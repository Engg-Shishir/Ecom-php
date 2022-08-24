<?php
include_once("../../../Connection/connection.php");
session_start(); 

if(!isset($_SESSION['user_session'])){
   echo "danger";
}else{   
   if($_POST['action'] == "addToCart"){
      $addToCart = mysqli_query($conn, "SELECT psno FROM cart where psno = '".$_POST['sno']."' ");
      $row = mysqli_fetch_assoc($addToCart);
      if(mysqli_num_rows($addToCart) > 0){
         echo "warning";
      }else{
         
         $sql = "INSERT INTO cart(`uid`,`psno`) VALUES ('" . $_SESSION['user_session'] . "','" . $_POST['sno'] . "')";
         
         if (mysqli_query($conn, $sql)) {
            $getCart = mysqli_query($conn, "SELECT * FROM cart where `uid` = '".$_SESSION['user_session']."' ");
            $total_data = mysqli_num_rows($getCart);
            echo $total_data;
            
         } else {
             echo "not insertde";
         }
      }
   }elseif($_POST['action'] == "show Cart Data"){

      $uid = $_SESSION['user_session'];

      $query = "SELECT `psno`,`qty`,`name`,price,`image`,`scharge`
      From cart,product
      where cart.uid = $uid 
      and cart.psno = product.sno";

      $row = mysqli_query($conn, $query);
      // $cust = mysqli_fetch_array($row);


   //    $products = array();
   //    $products = $cust;
  
   //   $keys = ['psno', 'price'];
   //   $values = [$total_data, $products];
   //   $array = array_combine($keys, $values);
  
      if (mysqli_num_rows($row) > 0) {
               
         $products = array();
         while ($rows = mysqli_fetch_assoc($row)) {
            $products[] = $rows;
         } 
          echo json_encode($products);
      }
   }

}

?>