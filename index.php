<?php
include_once("./Connection/connection.php");
session_start();
?>


<!DOCTYPE html>
<html lang="Eng">

<head>
	<!-- Meta Tag -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Eshop Ecommerce</title>

	<?php include_once "./Asset/Component/css.php"; ?>
</head>

<body class="js">

	<!-- include_once"./component/preloader.php"; -->
	<?php include_once "./Asset/Component/topbar.php"; ?>
	<?php include_once "./Asset/Component/slider.php"; ?>
	<?php include_once "./Asset/Component/hotItem.php"; ?>
	<?php include_once "./Asset/Component/newslateSubscrive.php"; ?>
	<?php include_once "./Asset/Component/footer.php"; ?>

</body>
<?php include_once "./Asset/Component/js.php"; ?>


<script>
	$(document).ready(function() {
		// $(window).scroll(function() {
		// 	var lastID = $('.load-more').attr('lastID');

		// 	if (($('.most-popular').height() <= $(window).scrollTop() + $(window).height()) && (lastID != 0)) {
		// 		$.ajax({
		// 			type: 'POST',
		// 			url: './Asset/Action/getData.php',
		// 			data: 'id=' + lastID,
		// 			beforeSend: function() {
		// 				$('.load-more').text("Loading ... ");
		// 			},
		// 			success: function(html) {
		// 				$('.load-more').text("Load More");
		// 				$('.most-popular').append(html);
		// 			}
		// 		});
		// 	}
		// });

		$('.load-more').on("click",function(){
			var lastID = $('.load-more').attr('lastID');
			var ok = $('#productShowDiv productColl:last-child');
			console.log(ok);
			$.ajax({
				type:'POST',
				url:'./Asset/Action/getData.php',
				data:'id='+lastID,
				beforeSend:function(){
					$('.load-more').text("Loading ... ");
				},
				success:function(html){
					// $('.load-more').text("Load More");
					$('#productShowDiv').append(html);
				}
			});
		});
	});
</script>

</html>