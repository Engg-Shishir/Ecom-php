	<!-- Start Most Popular -->
	<div class="product-area most-popular section">
		<div class="container">
			<div class="row">
				<div class="col-12 text-left">
					<div class="section-title">
						<h2>Hot Item</h2>
					</div>
				</div>
			</div>
			<div class="row" id="productShowDiv">
				<?php
				$query = mysqli_query($conn, "SELECT * FROM product ORDER BY id DESC LIMIT 6");
				if (mysqli_num_rows($query) > 0) {
					while ($row = $query->fetch_assoc()) {
						$lastProductID = $row["id"];
						$price = $row["price"];
						$data =  json_decode($row["image"]);
						$sno = $row["sno"];
				?>

					<div class="col-md-2 p-0 mb-2 productColl" productId="<?php  echo $row['id'];  ?>">
						<div class="owl-carousel popular-slider">
							<!-- Start Single Product -->
							<div class="single-product" productIds="<?php  echo $row['id'];  ?>">
								<div class="product-img">
									<a href="product-details.html">
										<img class="default-img" src="./admin/Asset/image/product/<?php echo $sno; ?>/<?php echo $data[0]; ?>" alt="#">
									</a>
								</div>
								<div class="product-content">
									<h3><a href="product-details.html">Black Sunglass</a></h3>
									<div class="product-price">
										<span class="old">$60.00</span>
										<span>$50.00</span>
									</div>
									<div class="button-heads">
										<div class="product-action ">
											<a title='View' href="product.php?sno=<?php echo $sno; ?>"><i class=" ti-eye"></i></a>

											<a title="Wishlist" href="#"><i class=" ti-heart "></i></a>

											<a title="Cart" href="#"><i class="fas fa-solid fa-cart-arrow-down"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php } } ?>
			</div>
			<div class="row">
				<button class="btn btn-warning btn-lg load-more" style="width:500px;margin-top:0px; margin-left:auto; margin-right:auto;" lastID="<?php echo $lastProductID; ?>" >Load More
				</button>
			</div>
		</div>
	</div>
	<!-- End Most Popular Area -->