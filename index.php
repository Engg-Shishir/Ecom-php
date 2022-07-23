
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
	
	<?php include_once"./component/css.php"; ?>
</head>
<body class="js">
     <!-- include_once"./component/topbar.php"; -->
	 	
	<!-- Preloader -->
     <?php  ?> 
	 <!-- include_once"./component/preloader.php"; -->
	<!-- End Preloader -->
	
	
	<?php include_once"./component/topbar.php"; ?>
	
	<!-- Slider Area -->
	<!--/ End Slider Area -->

	<section id="sliders"><!--slider-->
		<div class="container">
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="">
			    <ol class="carousel-indicators">
						<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="1" class=""></li>
					</ol>
				<div class="carousel-inner">
					<div class="carousel-item item active">
                      <div class="row">
						<div class="col-sm-6">
							<h1><span>E</span>-SHOPPER</h1>
							<h2>Free E-Commerce Template</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
							<button type="button" class="btn btn-default get">Get it now</button>
						</div>
						<div class="col-sm-6">
							<img src="./Asset/frontend/images/home/girl1.jpg" class="girl img-responsive" alt="">
							<img src="./Asset/frontend/images/home/pricing.png" class="pricing" alt="">
						</div>
					  </div>
					</div>
					<div class="carousel-item item">
                      <div class="row">
						<div class="col-sm-6">
							<h1><span>E</span>-SHOPPER</h1>
							<h2>Free E-Commerce Template</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
							<button type="button" class="btn btn-default get">Get it now</button>
						</div>
						<div class="col-sm-6">
							<img src="./Asset/frontend/images/home/girl1.jpg" class="girl img-responsive" alt="">
							<img src="./Asset/frontend/images/home/pricing.png" class="pricing" alt="">
						</div>
					  </div>
					</div>
				</div>
				
				<a href="#carouselExampleIndicators" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
				</a>
				<a href="#carouselExampleIndicators" class="right control-carousel hidden-xs" data-slide="next">
					<i class="fa fa-angle-right"></i>
				</a>
			</div>
		</div>
	</section>


    <?php  include_once("./component/login_signUp_popup.php");  ?>
	

	
	<!-- Start Most Popular -->
	<div class="product-area most-popular section">
        <div class="container">
            <div class="row">
				<div class="col-12">
					<div class="section-title">
						<h2>Hot Item</h2>
					</div>
				</div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel popular-slider">
						<!-- Start Single Product -->
						<div class="single-product">
							<div class="product-img">
								<a href="product-details.html">
									<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
									<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
									<span class="out-of-stock">Hot</span>
								</a>
								<div class="button-head">
									<div class="product-action">
										<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
										<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
										<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
									</div>
									<div class="product-action-2">
										<a title="Add to cart" href="#">Add to cart</a>
									</div>
								</div>
							</div>
							<div class="product-content">
								<h3><a href="product-details.html">Black Sunglass For Women</a></h3>
								<div class="product-price">
									<span class="old">$60.00</span>
									<span>$50.00</span>
								</div>
							</div>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!-- End Most Popular Area -->
	

	
	<!-- Start Shop Newsletter  -->
	<section class="shop-newsletter section">
		<div class="container">
			<div class="inner-top">
				<div class="row">
					<div class="col-lg-8 offset-lg-2 col-12">
						<!-- Start Newsletter Inner -->
						<div class="inner">
							<h4>Newsletter</h4>
							<p> Subscribe to our newsletter and get <span>10%</span> off your first purchase</p>
							<form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
								<input name="EMAIL" placeholder="Your email address" required="" type="email">
								<button class="btn">Subscribe</button>
							</form>
						</div>
						<!-- End Newsletter Inner -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Shop Newsletter -->
	
	<!-- Start Footer Area -->
	 <?php include_once"./component/footer.php"; ?>
	<!-- /End Footer Area -->

	 <!-- <div style="height:100vh;"></div> -->
</body>
	<?php include_once"./component/js.php"; ?>
</html>
