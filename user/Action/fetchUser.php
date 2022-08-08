<?php
include_once("../../Connection/connection.php");
session_start();

$uid = $_SESSION['user_session'];
$action = $_POST['action'];


if ($action == "load") {
    // $query = "SELECT * FROM users WHERE uid = {$uid}";
    $query = "SELECT * FROM users INNER JOIN userdetails ON users.email = userdetails.email AND users.uid=$uid";
    $row = mysqli_query($conn, $query);
    $cust = mysqli_fetch_array($row);


    if (mysqli_num_rows($row) > 0) {
        // $_SESSION['user_email'] = $data['email'];
        echo json_encode($cust);
    }
}
