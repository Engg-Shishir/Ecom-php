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

	<!-- Product Quick View Modal -->
	<?php include_once "./Asset/Component/part/productQuickViewModal.php"; ?>
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

		$('.load-more').on("click", function() {
			var lastID = $('.load-more').attr('lastID');
			var ok = $('#productShowDiv productColl:last-child');
			console.log(ok);
			$.ajax({
				type: 'POST',
				url: './Asset/Action/getData.php',
				data: 'id=' + lastID,
				beforeSend: function() {
					$(".load-more").append("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>");
				},
				success: function(html) {
					var res = $.parseJSON(html);
					setTimeout(() => {
						$('.load-more').text("Load More");
						res.forEach(element => {
							var images = $.parseJSON(element.image);
							var image = "./admin/Asset/image/product/" + element.sno;
							var data = "";
							data += "<div class='col-md-2 mb-2 productColl' productId='" + element.id + "'>";
							data += "<div class='single-product'>";
							data += "<div class='product-img'>";
							data += "<a href='product-details.html'>";
							data += "<img class='default-img'  src='" + image + "/" + images[0] + "' >";
							data += "<img class='hover-img'  src='" + image + "/";
							if (images[1] != null) data += images[1] + "' >";
							else data += images[0] + "' >";

							data += "</a>";
							data += "</div>";

							data += "<div class='product-content'>";
							data += "<h3><a href='product-details.html'>Black Sunglass For Women</a></h3>";
							data += "<div class='product-price'>";
							data += "<span class='old'>$60.00</span>";
							data += "<span>$50.00</span>";
							data += "</div>";
							data += "<div class='button-head'>";
							data += "<div class='product-action'>";
							data += "<a title='view' class='prductView' href='product.php?sno="+element.sno+"' ><i class=' ti-eye'></i></a>";

							data += "<a title='Wishlist' productId='" + element.id + "' href='#'><i class=' ti-heart '></i></a>";

							data += "<a title='Cart'  href='#'><i class='fas fa-solid fa-cart-arrow-down'></i></a>";
							data += "</div>";
							data += "</div>";
							data += "</div>";
							data += "</div>";
							data += "</div>";
							$('.load-more').attr("lastID", element.id);
							$('#productShowDiv').append(data);
						});
					}, 2000);
				}
			});
		});
	});
</script>


</html>