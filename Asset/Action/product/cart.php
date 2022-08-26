<?php
include_once("../../../Connection/connection.php");
session_start();

if (!isset($_SESSION['user_session'])) {
   echo "danger";
} else {
   if ($_POST['action'] == "addToCart") {
      $addToCart = mysqli_query($conn, "SELECT psno FROM cart where psno = '" . $_POST['sno'] . "' ");
      $row = mysqli_fetch_assoc($addToCart);
      if (mysqli_num_rows($addToCart) > 0) {
         echo "warning";
      } else {

         $sql = "INSERT INTO cart(`uid`,`psno`) VALUES ('" . $_SESSION['user_session'] . "','" . $_POST['sno'] . "')";

         if (mysqli_query($conn, $sql)) {
            $getCart = mysqli_query($conn, "SELECT * FROM cart where `uid` = '" . $_SESSION['user_session'] . "' ");
            $total_data = mysqli_num_rows($getCart);
            echo $total_data;
         } else {
            echo "not insertde";
         }
      }
   } elseif ($_POST['action'] == "show Cart Data") {

      $sno = sernum();
      $_SESSION['checkoutSno'] = $sno;

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
   } elseif ($_POST['action'] == "upadate Cart qrtyAndPrice") {
      // echo $_POST['cart']."----".$_POST['sno'];
      $updateToCart = mysqli_query($conn, "UPDATE `cart` SET `qty`='" . $_POST['cart'] . "' WHERE `psno`='" . $_POST['sno'] . "' ");

      if ($updateToCart) {

         $getCart = mysqli_query($conn, "SELECT cart.psno,cart.qty,product.price FROM cart 
            INNER JOIN product ON cart.psno = product.sno
            where `psno` = '" . $_POST['sno'] . "' ");
         $data = mysqli_fetch_assoc($getCart);
         echo json_encode($data);
      }
   } elseif ($_POST['action'] == "upadate Cart checkOutPartData") {

      $getCart = mysqli_query($conn, "SELECT cart.qty,product.price,product.scharge FROM cart 
      INNER JOIN product ON cart.psno = product.sno
      where `psno` = '" . $_POST['sno'] . "' ");
      // Cart Tble data
      $data = mysqli_fetch_assoc($getCart);

      // echo json_encode($data);


      $run2 = mysqli_query($conn, "SELECT * FROM preprocesscheckout where `sno` = '" . $_SESSION['checkoutSno'] . "' ");
      $rowCount = mysqli_num_rows($run2);
      



      if ($rowCount > 0) {
         // preprocesscheckout Tble data
         $data2 = mysqli_fetch_assoc($run2);
         
         if($_POST["isChecked"]=="checked"){
            if($data2['totalProduct'] < $data['qty']){
               $totalProduct = $data2['totalProduct'] + ($data['qty'] - $data2['totalProduct']);
            }else{
               $totalProduct = $data2['totalProduct'] - ($data2['totalProduct'] - $data['qty']);
            }
            $subTotal = $data2['subTotal'] + ($data['qty'] * $data['price']);
            $sCharge = $data2['sCharge'] + $data['scharge'];
            $total = $data2['total']+ ($data['qty'] * $data['price']) + $data['scharge'];

         }else{
            $totalProduct = $data2['totalProduct'] - $data['qty'];
            $subTotal = $data2['subTotal'] - ($data['qty'] * $data['price']);
            $sCharge = $data2['sCharge'] - $data['scharge'];
            $total = $data2['total']- ($data['qty'] * $data['price']) - $data['scharge'];
         }

         $updateToCart = mysqli_query($conn, "UPDATE `preprocesscheckout` 
         SET `totalProduct`='" . $totalProduct . "', 
         `subTotal`='" . $subTotal . "',
         `sCharge`='" . $sCharge . "', 
         `total`='" . $total . "' 
         WHERE `sno`='" . $_SESSION['checkoutSno'] . "' ");
         


      } else {
         $sql = "INSERT INTO preprocesscheckout (`totalProduct`,`subTotal`,`sCharge`,`total`,`sno`) VALUES ('" . $data['qty'] . "','" . ($data['qty'] * $data['price']) . "','" . $data['scharge'] . "','" . (($data['qty'] * $data['price'])+$data['scharge']) . "','" . $_SESSION['checkoutSno'] . "')";

         $getCart = mysqli_query($conn,$sql);
      }





      // if (mysqli_query($conn, $sql)) {
      //    $getCart = mysqli_query($conn, "SELECT * FROM cart where `uid` = '" . $_SESSION['user_session'] . "' ");
      //    $total_data = mysqli_num_rows($getCart);
      //    echo $total_data;
      // } else {
      //    echo "not insertde";
      // }
   } elseif ($_POST['action'] == "cuponCheck") {

      $getCart = mysqli_query($conn, "SELECT discount FROM cupon where `name` = '" . $_POST['cupon'] . "' ");
      $data = mysqli_fetch_assoc($getCart);
      echo json_encode($data);
   }
}


function sernum()
{
   $template   = 'XX99-XX99-99XX';
   $k = strlen($template);
   $sernum = '';
   for ($i = 0; $i < $k; $i++) {
      switch ($template[$i]) {
         case 'X':
            $sernum .= chr(rand(65, 90));
            break;
         case '9':
            $sernum .= rand(0, 9);
            break;
         case '-':
            $sernum .= '-';
            break;
      }
   }
   return $sernum;
}
