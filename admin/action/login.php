<?php
include_once("../../connection.php");
session_start();
if(isset($_POST['email']) && isset($_POST['password'])) {
	$user_email = trim($_POST['email']);
	$user_password = trim($_POST['password']);
	
	$sql = "SELECT * FROM users WHERE email='$user_email'";
	$resultset = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($resultset);	
		
	if($row['pass']==$user_password){				
		echo "ok";
		$_SESSION['user_session'] = $row['uid'];
	} else {				
		echo "email or password does not exist."; // wrong details 
	}		
}
?>