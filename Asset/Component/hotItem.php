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
				$query = mysqli_query($conn, "SELECT * FROM product ORDER BY id DESC LIMIT 4");
				if (mysqli_num_rows($query) > 0) {
					while ($row = $query->fetch_assoc()) {
						$lastProductID = $row["id"];
						$price = $row["price"];
						$data =  json_decode($row["image"]);
						$sno = $row["sno"];
				?>

					<div class="col-md-3 mb-5 productColl" productId="<?php  echo $row['id'];  ?>">
						<div class="owl-carousel popular-slider">
							<!-- Start Single Product -->
							<div class="single-product" productIds="<?php  echo $row['id'];  ?>">
								<div class="product-img">
									<a href="product-details.html">
										<img class="default-img" src="./admin/Asset/image/product/<?php echo $sno; ?>/<?php echo $data[0]; ?>" alt="#">
										<img class="hover-img" src="./admin/Asset/image/product/<?php echo $sno; ?>/<?php echo isset($data[1]) ? $data[1] : $data[0];  ?>" alt="#">
										<span class="out-of-stock">$ <?php echo $row["price"]; ?></span>
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
				<?php } } ?>
			</div>
				<button class="btn btn-warning btn-lg load-more" style="margin-top:100px; margin-left:auto; margin-right:10px;" lastID="<?php echo $lastProductID; ?>" >Load More</button>
		</div>
	</div>
	<!-- End Most Popular Area -->