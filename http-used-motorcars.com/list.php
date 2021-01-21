<?php include 'includes/head.php'; ?>
<?php include 'includes/loader.php'; ?>
<?php include 'includes/navigation.php'; ?>

<?php
ob_start();
require_once "util/connection.php";

$sql_post = "SELECT * FROM posts";
$query_list = mysqli_query($connection, $sql_post);

?>

<div class="page-heading wow fadeIn" data-wow-duration="0.5s">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="heading-content-bg wow fadeIn" data-wow-delay="0.75s" data-wow-duration="1s">
					<div class="row">
						<div class="heading-content col-md-12">
							<p><a href="index.html">Homepage</a> / <em> Cars</em> / <em> Listing</em></p>
							<h2>Cars <em>Listing</em></h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="on-listing wow fadeIn" data-wow-delay="0.5s" data-wow-duration="1s">
	<div class="container">
		<div class="recent-car-content">
			<div class="row">
				<div class="col-md-8">
					<div class="row">

						<?php
						while ($row = mysqli_fetch_array($query_list)) {
							echo '
							<div class="col-md-12">
							<div class="car-item">
								<div class="row">
									<div class="col-md-5">
										<div class="thumb-content">
											<div class="car-banner">
												<a href="detail.php?id=' . $row["id"] . '">For Sale</a>
											</div>
											<div class="thumb-inner">
											';
							$sql_post_image = "SELECT * FROM images where post_id = " . $row['id'] . "";
							$query_image = mysqli_query($connection, $sql_post_image);
							$firstrow = mysqli_fetch_assoc($query_image);
							mysqli_data_seek($query_image, 0);
							echo '
												<a href="detail.php?id=' . $row["id"] . '"><img src="../uploads/post/' . $firstrow["name"] . '" alt=""></a>
												';

							echo '		</div>
										</div>
									</div>
									<div class="col-md-7">
										<div class="down-content">
											<a href="detail.php?id=' . $row["id"] . '">
												<h4>' . $row['title'] . '</h4>
											</a>
											<span>' . $row['amount'] . '</span>
											<div class="line-dec"></div>
											<p>' . $row['description'] . '</p>
											<ul class="car-info">
												<li>
													<div class="item"><i class="flaticon flaticon-calendar"></i>
														<p>' . $row['vehicleYear'] . '</p>
													</div>
												</li>
												<li>
													<div class="item"><i class="flaticon flaticon-speed"></i>
														<p>' . $row['speed'] . 'p/h</p>
													</div>
												</li>
												<li>
													<div class="item"><i class="flaticon flaticon-road"></i>
														<p>' . $row['distance'] . '</p>
													</div>
												</li>
												';
							$sql_post_fuel = "SELECT * FROM fueltype where id = " . $row['fuelId'] . "";
							$query_fuel = mysqli_query($connection, $sql_post_fuel);
							$fuelrow = mysqli_fetch_assoc($query_fuel);
							mysqli_data_seek($query_fuel, 0);
							echo '
												<li>
													<div class="item"><i class="flaticon flaticon-fuel"></i>
														<p>' . $fuelrow['name'] . '</p>
													</div>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
							';
						}
						?>


						<!-- <div class="col-md-12">
							<div class="page-numbers">
								<div class="pagination-content">
									<ul>
										<li class="active"><a href="#">1</a></li>
										<li><a href="#">2</a></li>
										<li><a href="#">3</a></li>
										<li><a href="#">4</a></li>
										<li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
									</ul>
								</div>
							</div>
						</div> -->
					</div>
				</div>
				<div class="col-md-4">
					<div class="sidebar-widgets">
						<div class="row">
							<div class="col-md-12">
								<div class="sidebar-widget">
									<div class="search-content">
										<div class="search-heading">
											<div class="icon">
												<i class="fa fa-search"></i>
											</div>
											<div class="text-content">
												<h2>Quick Search</h2>
											</div>
										</div>
										<div class="search-form">
											<div class="row">
												<div class="col-md-12">
													<input type="text" onfocus="this.value=''" value="Type keywords...">
												</div>
												<div class="col-md-12">
													<div class="input-select">
														<select name="brand" id="brand">
															<option value="-1">Select Brand</option>
															<option>Wolkswagen</option>
															<option>Audi</option>
															<option>Bmw</option>
															<option>Opel</option>
															<option>Citroen</option>
														</select>
													</div>
												</div>
												<div class="col-md-12">
													<div class="input-select">
														<select name="mark" id="mark">
															<option value="-1">Select Mark</option>
															<option>Audi A3</option>
															<option>Audi A4</option>
															<option>Audi A5</option>
															<option>Audi A6</option>
															<option>Audi A7</option>
														</select>
													</div>
												</div>
												<div class="col-md-6">
													<div class="input-select">
														<select name="min-price" id="min-price">
															<option value="-1">Min Price</option>
															<option>$500</option>
															<option>$1.000</option>
															<option>$1.500</option>
															<option>$2.000</option>
															<option>$2.500</option>
														</select>
													</div>
												</div>
												<div class="col-md-6">
													<div class="input-select">
														<select name="max-price" id="max-price">
															<option value="-1">Max Price</option>
															<option>$5.000</option>
															<option>$7.500</option>
															<option>$10.000</option>
															<option>$15.500</option>
															<option>$20.000</option>
														</select>
													</div>
												</div>
												<div class="col-md-12">
													<div class="input-select">
														<select name="fuel" id="fuel">
															<option value="-1">Fuel Type</option>
															<option>Gasoline</option>
															<option>Diesel</option>
															<option>Energy</option>
														</select>
													</div>
												</div>
												<div class="col-md-12">
													<div class="input-select">
														<select name="transmission" id="transmission">
															<option value="-1">Transmission Type</option>
															<option>Automatic</option>
															<option>Manual</option>
														</select>
													</div>
												</div>
												<div class="col-md-12">
													<div class="input-select">
														<select name="body" id="body">
															<option value="-1">Body Type</option>
															<option>Mini Car</option>
															<option>Coupe</option>
															<option>Convertible</option>
															<option>Pick Up</option>
														</select>
													</div>
												</div>
												<div class="col-md-12">
													<div class="secondary-button">
														<a href="#">Search <i class="fa fa-search"></i></a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include 'includes/footer.php'; ?>