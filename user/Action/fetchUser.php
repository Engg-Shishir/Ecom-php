<?php
include_once("../../Connection/connection.php");
session_start();

$uid = $_SESSION['user_session'];
$action = $_POST['action'];


if ($action == "load") {
    // $query = "SELECT * FROM users WHERE uid = {$uid}";
    $query = "SELECT * FROM users 
    INNER JOIN userdetails ON users.email = userdetails.email 
    INNER JOIN cart ON users.uid = cart.uid 
    where users.uid=$uid";
    $row = mysqli_query($conn, $query);
    $cust = mysqli_fetch_array($row);

    $total_data = mysqli_num_rows($row);

    $products = array();
    $products = $cust;

   $keys = ['cart', 'user'];
   $values = [$total_data, $products];
   $array = array_combine($keys, $values);

    if (mysqli_num_rows($row) > 0) {
        echo json_encode($array);
    }
}
