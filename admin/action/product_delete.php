<?php
include_once("../../connection.php");



	$sql = $sql = "DELETE FROM product WHERE id= {$_POST['id']}";
    if (mysqli_query($conn, $sql) == TRUE) {
        echo "done";
    }

?>