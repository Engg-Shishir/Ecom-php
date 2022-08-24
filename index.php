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
	<?php include_once "./User/component/product/viewCartModal.php"; ?>
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
							var data = '' +
								'<div class="col-md-2 p-0 mb-2 productColl" productId="' + element.id + '">' +
								   '<div class="owl-carousel popular-slider">' +
								       '<div class="single-product" productIds="">' +
											'<div class="product-img">'+
												'<a href="product-details.html">'+
													'<img class="default-img" src="' + image + '/' + images[0] + '" >'+
												'</a>'+
											'</div>'+

											'<div class="product-content">'+
												'<h3><a href="product-details.html">Black Sunglass</a></h3>'+
												'<div class="product-price">'+
												'<span class="old">$60.00</span><span>$50.00</span>'+
												'</div>'+
												'<div class="button-heads">' +
												    '<div class="product-action ">'+
													     '<a title="View" href="product.php?sno=' + element.sno + '"><i class=" ti-eye"></i></a>'+
														 '<a  class="wishlistBtn" title="Wishlist" data-sno="'+ element.sno +'"><i class=" ti-heart"></i></a>'+
														 '<a class="cartBtn" title="Cart" data-sno="'+ element.sno +'"><i class="fas fa-solid fa-cart-arrow-down"></i></a>'+
													'</div>'+
												'</div>'+
											'</div>'+
										'</div>'+
									'</div>'+
								'</div>';

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