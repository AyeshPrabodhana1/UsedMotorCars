<?php include 'includes/head.php'; ?>
<?php include 'includes/loader.php'; ?>
<?php include 'includes/navigation.php'; ?>

<?php
ob_start();
require_once "util/connection.php";

$brand;
$type;
$sql_post;

if (isset($_GET['brand'])) {
	$brand = $_GET['brand'];
	$sql_post = "SELECT * FROM posts where brandId = $brand";
} else if (isset($_GET['type'])) {
	$type = $_GET['type'];
	$sql_post = "SELECT * FROM posts where typeId = $type";
} else {
	$sql_post = "SELECT * FROM posts";
}

// if ($_POST){
// 	echo "<script>console.log('Debug Objects: ' );</script>";
// 	$sql_post = "SELECT * FROM posts";

// 	if(!empty($brand))
//     	$andParts[] = "brandId = '$brand'";

// 	if(!empty($type))
//     	$andParts[] = "typeId = $type";

// 	if (!empty($transmission))
//     	$andParts[] = "transmissionId = $transmission";

// 	if (!empty($fuel))
// 		$andParts[] = "fuelId = $fuel";
		
// 	if (!empty($andParts))
// 		   $sql_post .= " WHERE ".implode(" AND " , $andParts);

// 	echo "<script>console.log('Debug Objects: " . $sql_post . "' );</script>";
	
// 	$query_list = mysqli_query($connection, $sql_post);
// }

$query_list = mysqli_query($connection, $sql_post);

$sql_brand = "SELECT * FROM vehicle_brand";
$query_brand_list = mysqli_query($connection, $sql_brand);

$sql_type = "SELECT * FROM vehicle_type";
$query_type_list = mysqli_query($connection, $sql_type);

$sql_fuel = "SELECT * FROM fueltype";
$query_fuel_list = mysqli_query($connection, $sql_fuel);

$sql_transmission = "SELECT * FROM transmissiontype";
$query_transmission_list = mysqli_query($connection, $sql_transmission);

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
										<form action="#" method="post">
											<div class="row">
												<div class="col-md-12">
													<div class="input-select">
														<select name="brand" id="brand">
															<option value="-1" readonly>Select Brand</option>
														<?php
                               								while($data = mysqli_fetch_array($query_brand_list))
                               								{
                                								echo "<option value='". $data['id'] ."'>" .$data['name'] ."</option>"; 
                                							}
                               							?>
														</select>
													</div>
												</div>
												<div class="col-md-12">
													<div class="input-select">
														<select name="type" id="type">
														<option value="-1" readonly>Select Vehicle Type</option>
														<?php
                               								while($data = mysqli_fetch_array($query_type_list))
                               								{
                                								echo "<option value='". $data['id'] ."'>" .$data['name'] ."</option>"; 
                                							}
                               							?>
														</select>
													</div>
												</div>
												<div class="col-md-12">
													<div class="input-select">
														<select name="fuel" id="fuel">
															<option value="-1" readonly>Select Fuel Type</option>
														<?php
                               								while($data = mysqli_fetch_array($query_fuel_list))
                               								{
                                								echo "<option value='". $data['id'] ."'>" .$data['name'] ."</option>"; 
                                							}
                               							?>
														</select>
													</div>
												</div>
												<div class="col-md-12">
													<div class="input-select">
														<select name="transmission" id="transmission">
															<option value="-1" readonly>Select Transmission Type</option>
														<?php
                               								while($data = mysqli_fetch_array($query_transmission_list))
                               								{
                                								echo "<option value='". $data['id'] ."'>" .$data['name'] ."</option>"; 
                                							}
                               							?>
														</select>
													</div>
												</div>
												<div class="col-md-12">
													<div class="secondary-button">
														<button name="submit" (click)="searchForm()" type="button" >Submit</button>
													</div>
												</div>
											</div>
											</form>
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

<script>
	function searchForm() {
		alert('rest');
	}
</script>