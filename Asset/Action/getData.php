<?php
include_once("../../Connection/connection.php");

if (isset($_POST['id'])) {
    $start = $_POST['id'];
    $limit = 6;
    //   $query = 
    $result = mysqli_query($conn, "SELECT * FROM product WHERE id< '" . $start . "' ORDER BY id DESC LIMIT " . $limit);

    if (mysqli_num_rows($result) > 0) {
        
        $products = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $products[] = $row;
        }
        echo json_encode($products);
    }
}

?>