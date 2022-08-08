<?php
include_once("../../Connection/connection.php");
session_start();
$userName = mysqli_real_escape_string($conn, $_POST['userName']);
$userEmail = mysqli_real_escape_string($conn, $_POST['userEmail']);
$userPhone = mysqli_real_escape_string($conn, $_POST['userPhone']);
$userPassword = mysqli_real_escape_string($conn, $_POST['userPassword']);



$sql = "INSERT INTO `users`(`email`,`pass`,`role`) VALUES ('" . $userEmail . "','" . $userPassword . "','user');";
$sql .= "INSERT INTO `userdetails`(`email`,`name`,`phone`) VALUES ('" . $userEmail . "','" . $userName . "','" . $userPhone . "')";

//Object oriented style
if ($conn->multi_query($sql) == TRUE) {
  echo "success";
}
