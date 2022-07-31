
<?php 
  session_start();
?>


<!DOCTYPE html>
<html lang="zxx">
<head>
	<!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Title Tag  -->
    <title>Eshop - eCommerce HTML5 Template.</title>
    <link rel="icon" type="image/png" href="./Asset/frontend/images/favicon.png">
	
	<?php include_once"./Asset/Component/css.php"; ?>
</head>
<body class="js">

	<!-- include_once"./component/preloader.php"; -->
	<?php include_once"./Asset/Component/topbar.php"; ?>
	<?php include_once"./Asset/Component/slider.php"; ?>
	<?php include_once"./Asset/Component/hotItem.php"; ?>
	<?php include_once"./Asset/Component/newslateSubscrive.php"; ?>
	<?php include_once"./Asset/Component/footer.php"; ?>

</body>
	<?php include_once"./Asset/Component/js.php"; ?>
	<script>
		$(function(){
              // Banner Slick Slider
				$('.content').slick({
					dots: false,
					infinite: true,
					// fade: true,
					cssEase: 'linear',
					autoplay: true,
					autoplaySpeed: 3000,
					prevArrow:'.prev',
					nextArrow:'.next'
					
				});
		});
	</script>
</html>
