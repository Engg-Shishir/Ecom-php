<?php
include_once("../../Connection/connection.php");
session_start();

$uids = $_SESSION['user_session'];
$action = $_POST['action'];






if ($action == "update") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    if (isset($_FILES['image'])) {

        $img_name = $_FILES['image']['name'];
        $img_type = $_FILES['image']['type'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $img_explode = explode('.', $img_name);
        $img_ext = end($img_explode);

        $extensions = ["jpeg", "png", "jpg"];
        if (in_array($img_ext, $extensions) === true) {
            $types = ["image/jpeg", "image/jpg", "image/png"];
            if (in_array($img_type, $types) === true) {
                $new_img_name = $_SESSION['user_session'] . "." . $img_ext;
                $dirname = "../image/";
                $path = $dirname . $new_img_name;

                if (move_uploaded_file($tmp_name, $path)) {

                    $select = mysqli_query($conn, "SELECT email FROM users WHERE uid ='" . $uids . "'");
                    $row = mysqli_fetch_array($select);

                    $select1 = mysqli_query($conn, "UPDATE `users` SET `email`='{$email}',`pass`='" . $password . "' WHERE `email`='" . $row['email'] . "'");

                    $select2 = mysqli_query($conn, "UPDATE `userdetails` SET `email`='" . $email . "',`name`='" . $name . "',`phone`='" . $phone . "',`photo`='" . $new_img_name . "' WHERE `email`='" . $row['email'] . "'");

                    if ($select1 && $select2) {
                        echo "success_image";
                    }
                }
            } else {
                echo "Please upload an image file - jpeg, png, jpg";
            }
        } else {
            echo "Please upload an image file - jpeg, png, jpg";
        }
    } else {


        $select = mysqli_query($conn, "SELECT email FROM users WHERE uid ='" . $uids . "'");
        $row = mysqli_fetch_array($select);

        $select1 = mysqli_query($conn, "UPDATE `users` SET `email`='$email',`pass`='$password' WHERE `email`='" . $row['email'] . "'");

        $select2 = mysqli_query($conn, "UPDATE `userdetails` SET `email`='$email',`name`='$name',`phone`='$phone' WHERE `email`='{$row['email']}'");

        if ($select1 && $select2) {
            echo "success";
        }
    }
}
