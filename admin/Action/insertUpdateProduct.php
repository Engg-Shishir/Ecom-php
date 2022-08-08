<?php
session_start();
include_once("../../Connection/connection.php");
$action = $_POST['actions'];
$products = array();


$pname = $_POST['productName'];
$pprice = $_POST['productPrice'];
$pcategory = $_POST['productCategory'];
$pscharge = $_POST['shipingCharge'];
$pquantity = $_POST['productQuantity'];
$pdiscount = $_POST['productDiscount'];
$pdetails = $_POST['productDetails'];
$sirial = $_POST['sno'];







if ($pname != "" && $pprice != "" && $pcategory != "Select Category" && $pdetails != "" && $pquantity != "" && $pdiscount != "" && $pscharge != "Select Shipping Charge") {

    if ($action == "insert") {
        foreach ($_FILES['images']['name'] as $key => $value) {
            $file_name = explode(".", $_FILES['images']['name'][$key]);
            $img_ext = strtolower(end($file_name));
            $allowed_ext = array("jpg", "jpeg", "png");
            if (in_array($img_ext, $allowed_ext)) {
                $new_name = $_POST["productName"] . '.' . $key . '.' . $img_ext;
                $sourcePath = $_FILES['images']['tmp_name'][$key];
                $targetPath = "../Asset/image/product/" . $new_name;
                if (move_uploaded_file($sourcePath, $targetPath)) {
                    array_push($products, $new_name);
                }
            }
        }

        if (count($products) > 0) {
            $image = json_encode($products);

            $sno = sernum();
            $sql = "INSERT INTO product(sno,name, price, category, details, quantity, discount, scharge,image) VALUES ('" . $sno . "','" . $pname . "','" . $pprice . "','" . $pcategory . "','" . $pdetails . "','" . $pquantity . "','" . $pdiscount . "','" . $pscharge . "','" . $image . "')";


            $run = mysqli_query($conn, $sql);
            if ($run) {
                echo "success";
            } else {
                echo "not insertde";
            }
        } else {
            echo "empty filed warning";
        }
    } else {
        foreach ($_FILES['images']['name'] as $key => $value) {
            $file_name = explode(".", $_FILES['images']['name'][$key]);
            $img_ext = strtolower(end($file_name));
            $allowed_ext = array("jpg", "jpeg", "png");
            if (in_array($img_ext, $allowed_ext)) {
                $new_name = $_POST["productName"] . '.' . $key . '.' . $img_ext;
                $sourcePath = $_FILES['images']['tmp_name'][$key];
                $targetPath = "../Asset/image/product/" . $new_name;
                if (move_uploaded_file($sourcePath, $targetPath)) {
                    array_push($products, $new_name);
                }
            }
        }


        if (count($products) > 0) {
            $image = json_encode($products);


            $sql = mysqli_query($conn, "UPDATE `product`SET `name`='" . $pname . "',`price`='" . $pprice . "',`category`='" . $pcategory . "', `details`='" . $pdetails . "',`quantity`='" . $pquantity . "',`discount`='" . $pdiscount . "',`scharge`='" . $pscharge . "',`image`='$image' WHERE  `sno`='" . $sirial . "'");

            if ($sql) {
                echo "success";
            }
        } else {
            $sql = mysqli_query($conn, "UPDATE `product`SET `name`='" . $pname . "',`price`='" . $pprice . "',`category`='" . $pcategory . "', `details`='" . $pdetails . "',`quantity`='" . $pquantity . "',`discount`='" . $pdiscount . "',`scharge`='" . $pscharge . "' WHERE  `sno`='" . $sirial . "'");

            if ($sql) {
                echo "success";
            }
        }
    }
} else {
    echo "failed";
}



function sernum()
{
    $template   = 'XX99-XX99-99XX';
    $k = strlen($template);
    $sernum = '';
    for ($i = 0; $i < $k; $i++) {
        switch ($template[$i]) {
            case 'X':
                $sernum .= chr(rand(65, 90));
                break;
            case '9':
                $sernum .= rand(0, 9);
                break;
            case '-':
                $sernum .= '-';
                break;
        }
    }
    return $sernum;
}
