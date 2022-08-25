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
   }elseif($_POST['action'] == "upadate Cart qrtyAndPrice"){
      // echo $_POST['cart']."----".$_POST['sno'];
      $updateToCart = mysqli_query($conn, "UPDATE `cart` SET `qty`='".$_POST['cart']."' WHERE `psno`='".$_POST['sno']."' ");

      if ($updateToCart) {

            $getCart = mysqli_query($conn, "SELECT cart.psno,cart.qty,product.price FROM cart 
            INNER JOIN product ON cart.psno = product.sno
            where `psno` = '".$_POST['sno']."' ");
            $data = mysqli_fetch_assoc($getCart);
            echo json_encode($data);
     }
   }elseif($_POST['action'] == "upadate Cart checkOutPartData"){

      $getCart = mysqli_query($conn, "SELECT cart.qty,product.price FROM cart 
      INNER JOIN product ON cart.psno = product.sno
      where `psno` = '".$_POST['sno']."' ");
      $data = mysqli_fetch_assoc($getCart);
      echo json_encode($data);

   }

}

?>