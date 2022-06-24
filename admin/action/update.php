<?php
include_once("../../connection.php");
session_start();


$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$uid = $_SESSION['user_session'];


if(isset($_FILES['image'])){


	$img_name = $_FILES['image']['name'];
	$img_type = $_FILES['image']['type'];
	$tmp_name = $_FILES['image']['tmp_name'];
	$img_explode = explode('.',$img_name);
	$img_ext = end($img_explode);

	$extensions = ["jpeg", "png", "jpg"];
	if(in_array($img_ext, $extensions) === true){
		$types = ["image/jpeg", "image/jpg", "image/png"];
		if(in_array($img_type, $types) === true){


			$new_img_name = $_SESSION['user_session'].".".$img_ext;
            $path = "images/".$new_img_name;
            
			// Check file name is avilable avilable or not with different file type
            $name1 = "images/".$_SESSION['user_session'].".jpg";
			$name2 = "images/".$_SESSION['user_session'].".png";
			$name3 = "images/".$_SESSION['user_session'].".jpeg";




			if(file_exists($name1)) unlink($name1);
			if(file_exists($name2)) unlink($name2);
			if(file_exists($name3)) unlink($name3);

			if(move_uploaded_file($tmp_name,"images/".$new_img_name)){
				$select_sql2 = mysqli_query($conn, "UPDATE `users` SET `user`='$name',`pass`='$password',`email`='$email',`profile_photo`='$new_img_name' WHERE `uid`='{$_SESSION['user_session']}' ");
				if($select_sql2){
					echo "success";
				}
			}




		}else{
			echo "Please upload an image file - jpeg, png, jpg";
		}
	}else{
		echo "Please upload an image file - jpeg, png, jpg";
	}
}else{
	$select_sql2 = mysqli_query($conn, "UPDATE `users` SET `user`='$name',`pass`='$password',`email`='$email' WHERE `uid`='{$_SESSION['user_session']}'");
	if($select_sql2){
		echo "success";
	}

}
?>