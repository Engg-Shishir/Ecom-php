 



<?php
include_once("../../connection.php");
session_start();
$pname = $_POST['pname'];
$pprice = $_POST['pprice'];
$pcategory = $_POST['pcategory'];
$pdetails = $_POST['pdetails'];
$pquantity = $_POST['pquantity'];
$pdiscount = $_POST['pdiscount'];
$pscharge = $_POST['pscharge'];

	if(isset($_FILES['image'])){
		$sno = sernum();
		$image = getImageName($sno);
		$sql = "INSERT INTO `product`(`sno`,`name`, `price`, `category`, `details`, `quantity`, `discount`, `scharge`,`image`) VALUES ('$sno','$pname','$pprice','$pcategory','$pdetails','$pquantity','$pdiscount','$pscharge','$image')";

		if($conn->query($sql)==TRUE){
			echo "success";
		}
	}
?>


<?php
function sernum()
{
    $template   = 'XX99-XX99-99XX';
    $k = strlen($template);
    $sernum = '';
    for ($i=0; $i<$k; $i++)
    {
        switch($template[$i])
        {
            case 'X': $sernum .= chr(rand(65,90)); break;
            case '9': $sernum .= rand(0,9); break;
            case '-': $sernum .= '-';  break; 
        }
    }
    return $sernum;
}




	function getImageName($sno){

		$img_name = $_FILES['image']['name'];
		$img_type = $_FILES['image']['type'];
		$tmp_name = $_FILES['image']['tmp_name'];
		$img_explode = explode('.',$img_name);
		$img_ext = end($img_explode);

		$extensions = ["jpeg", "png", "jpg"];
		if(in_array($img_ext, $extensions) === true){
			$types = ["image/jpeg", "image/jpg", "image/png"];
			if(in_array($img_type, $types) === true){

                
				$new_img_name = $sno.".".$img_ext;
				$path = "../image/product/".$new_img_name;
				
				// Check file name is avilable avilable or not with different file type
				$name1 = "../image/product/".sernum().".jpg";
				$name2 = "../image/product/".sernum().".png";
				$name3 = "../image/product/".sernum().".jpeg";




				if(file_exists($name1)) unlink($name1);
				if(file_exists($name2)) unlink($name2);
				if(file_exists($name3)) unlink($name3);

				move_uploaded_file($tmp_name,"../image/product/".$new_img_name);

                return $new_img_name;
			}
		}
	}
?>  



 
