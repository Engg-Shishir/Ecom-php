<?php
session_start();
include_once("../../Connection/connection.php");
$action = $_POST['action'];

if ($action == "insert") {
    $sql = "INSERT INTO cupon(`name`,`discount`) VALUES ('" . $_POST['name'] . "','" . $_POST['discount'] . "')";

    if (mysqli_query($conn, $sql)) {
        echo "done";
    } else {
        echo "not insertde";
    }
} elseif ($action == "get") {

    $query_run = mysqli_query($conn, "SELECT * FROM cupon");
    $result_array = [];
    foreach ($query_run as $row) {
        array_push($result_array, $row);
    }
    echo json_encode($result_array);
} elseif ($action == "getSingleCupon") {
    $getCupon = mysqli_query($conn, "SELECT * FROM cupon ORDER BY id DESC LIMIT 1");
    $data = mysqli_fetch_assoc($getCupon);
    echo json_encode($data);
}
