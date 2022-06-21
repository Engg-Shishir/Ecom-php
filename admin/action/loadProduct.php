<?php
include_once("../../connection.php");
session_start();
$query = "SELECT * FROM `product`";
$query_run = mysqli_query($conn, $query);

// $cust = mysqli_fetch_array($query_run);
// if(mysqli_num_rows($query_run) > 0)
// {
//     echo json_encode($cust);
// }





$result_array = [];
if(mysqli_num_rows($query_run) > 0)
{
    foreach($query_run as $row)
    {
        array_push($result_array, $row);
    }
    echo json_encode($result_array);
}
else
{
    echo $return = "<h4>No Record Found</h4>";
}



mysqli_close($conn);
?>