<?php
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $dbname = "coffe";

  $conn = mysqli_connect($hostname, $username, $password, $dbname);
  if(!$conn){
    echo "Database connection error";
  }
?>
