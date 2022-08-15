<?php   
  include_once("../../Connection/connection.php");

  $id = $_POST['id'];
  $query = "SELECT * FROM `product` WHERE id ='" . $id . "'";
  $query_run = mysqli_query($conn, $query);

  $cust = mysqli_fetch_assoc($query_run);
  if (mysqli_num_rows($query_run) > 0) {
    echo json_encode($cust);
  }

?>