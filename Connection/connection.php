<?php
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $dbname = "my_ecom";

  $conn = mysqli_connect($hostname, $username, $password, $dbname);
  if(!$conn){
    echo "Database connection error";
  }
?>
