<?php
include_once("../../connection.php");
$keywords = $_POST['data'];
$query = "SELECT  * from `product` WHERE `name` LIKE '%$keywords%'";

$query_run = mysqli_query($conn, $query);


$fetch_assoc = mysqli_fetch_assoc($query_run);
$fetch_array = mysqli_fetch_array($query_run);



$result_array = [];
if(mysqli_num_rows($query_run) > 0)
{
    foreach($query_run as $row)
    {
        array_push($result_array, $row);
    }
    echo json_encode($result_array);
}else{
    echo json_encode($result_array);
}
   


?>

