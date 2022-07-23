<?php   
    include_once("../../connection.php");
    session_start();
    $userEmail = mysqli_real_escape_string($conn,$_POST['email']);
    $userPassword = mysqli_real_escape_string($conn,$_POST['password']);
        
        $sql = "SELECT * FROM `users` WHERE `email`='$userEmail'";
        $resultset = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($resultset);	

        if(mysqli_num_rows($resultset) > 0)
        {
            if($row['pass']==$userPassword){	
                // $_SESSION['user_session'] = $row['uid'];			
                echo "success";
            }else{
                echo "failed"; 
            }
        }else{
            echo "failed"; 
        }
	


?>