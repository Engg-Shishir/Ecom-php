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

      $query = "SELECT `psno`,`qty`,`name`,`price`,`image`,`scharge`,`check`
      From cart,product
      where cart.uid = $uid 
      and cart.psno = product.sno";

      $row = mysqli_query($conn, $query);

      $products = array();
      if (mysqli_num_rows($row) > 0) {
         while ($rows = mysqli_fetch_assoc($row)) {
            $products[] = $rows;
         }
      }

      $checkoutData = writeCheckout($conn);
      $keys = ['cart', 'checkout'];
      $values = [$products, $checkoutData];
      $array = array_combine($keys, $values);
      echo json_encode($array);
   } elseif ($_POST['action'] == "upadate Cart qrtyAndPrice") {
      $updateToCart = mysqli_query($conn, "UPDATE `cart` SET `qty`='" . $_POST['cart'] . "' WHERE `psno`='" . $_POST['sno'] . "' ");

      if ($updateToCart) {

         $getCart = mysqli_query($conn, "SELECT cart.psno,cart.qty,product.price FROM cart 
            INNER JOIN product ON cart.psno = product.sno
            where `psno` = '" . $_POST['sno'] . "' ");
         $data = mysqli_fetch_assoc($getCart);
         // echo json_encode($data);

         $checkoutData = writeCheckout($conn);
         // echo json_encode($checkoutData);

         $keys = ['cart', 'checkout'];
         $values = [$data, $checkoutData];
         $array = array_combine($keys, $values);
         echo json_encode($array);


      }
   } elseif ($_POST['action'] == "upadate Cart checkOutPartData") {

      $uid = $_SESSION['user_session'];

      if ($_POST["isChecked"] == "checked") {
         mysqli_query($conn, "UPDATE `cart` SET `check`= 1 WHERE `psno`='" . $_POST['sno'] . "' ");
      } else {
         mysqli_query($conn, "UPDATE `cart` SET `check`= 0 WHERE `psno`='" . $_POST['sno'] . "' ");
      }

      $checkoutData = writeCheckout($conn);
      echo json_encode($checkoutData);


   } elseif ($_POST['action'] == "cuponCheck") {


      $musql = "SELECT discount FROM cupon where `name` = '" . $_POST['cupon'] . "' ";
      $rows = mysqli_query($conn, $musql);
      if (mysqli_num_rows($rows) > 0) {

         $data = mysqli_fetch_assoc($rows);
         $updateToCart11 = mysqli_query($conn, "UPDATE `preprocesscheckout` SET `cupon`='" . $data['discount'] . "' WHERE `sno`='" . $_SESSION['checkoutSno'] . "' ");   

         if ($updateToCart11) {

            $checkoutData = writeCheckout($conn);
            echo json_encode($checkoutData);

         }
      }
   }
}



function writeCheckout($conn)
{
   $uid = $_SESSION['user_session'];

   $sql =  "SELECT cart.psno,cart.qty,cart.check,product.price,product.scharge FROM cart 
   INNER JOIN product ON cart.psno = product.sno
   where `check` = 1  ";

   $row = mysqli_query($conn, $sql);
   if (mysqli_num_rows($row) > 0) {


      $totalProduct = 0;
      $subTotal = 0;
      $sCharge = 0;
      $total = 0;

      while ($rows = mysqli_fetch_assoc($row)) {
         $totalProduct = $totalProduct + $rows['qty'];
         $subTotal = $subTotal + $rows['qty'] * $rows['price'];
         $sCharge = $sCharge + $rows['scharge'];
         $total = $total + $rows['qty'] * $rows['price'] + $rows['scharge'];
      }


      $sql1 =  "SELECT sno,cupon FROM preprocesscheckout where `sno` = '" . $_SESSION['checkoutSno'] . "'  ";
      $row1 = mysqli_query($conn, $sql1);
      if (mysqli_num_rows($row1) > 0) {
         $rows = mysqli_fetch_assoc($row1);
         if($rows['cupon']==null){
            $updateToCart11 = mysqli_query($conn, "UPDATE `preprocesscheckout` SET `totalProduct`='" . $totalProduct . "',`subTotal`='" . $subTotal . "',`sCharge`='" . $sCharge . "',`total`='" . $total . "' WHERE `sno`='" . $_SESSION['checkoutSno'] . "' ");

         }else{
            $updateToCart11 = mysqli_query($conn, "UPDATE `preprocesscheckout` SET `totalProduct`='" . $totalProduct . "',`subTotal`='" . $subTotal . "',`sCharge`='" . $sCharge . "',`total`='" . ($total-$rows['cupon']) . "' WHERE `sno`='" . $_SESSION['checkoutSno'] . "' ");
         }




         if ($updateToCart11) {
            $insertChekoutTableDataget1 = mysqli_query($conn, "SELECT * FROM preprocesscheckout where `sno` = '" . $_SESSION['checkoutSno'] . "' ");
            $data11 = mysqli_fetch_assoc($insertChekoutTableDataget1);
            return $data11;
         }

      }else{
         $sql = "INSERT INTO preprocesscheckout (`totalProduct`,`subTotal`,`sCharge`,`total`,`sno`) VALUES ('" . $totalProduct . "','" . $subTotal . "','" . $sCharge . "','" . $total . "','" . $_SESSION['checkoutSno'] . "')";
         $insertChekoutTableData = mysqli_query($conn, $sql);
         if ($insertChekoutTableData) {

            $insertChekoutTableDataget = mysqli_query($conn, "SELECT * FROM preprocesscheckout where `sno` = '" . $_SESSION['checkoutSno'] . "' ");
            $data1 = mysqli_fetch_assoc($insertChekoutTableDataget);
            return $data1;
         }
      }

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
