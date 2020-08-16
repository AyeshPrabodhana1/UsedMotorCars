<?php include 'includes/head.php'; ?>
<?php include 'includes/loader.php'; ?>
<?php include 'includes/navigation.php'; ?>

<?php
ob_start();
require_once "util/connection.php";

if (isset($_GET['id'])) {
	$postid = $_GET['id'];
}

$sql = "SELECT 
p.id, p.ref_no, p.title, p.description, p.amount, p.chassis, p.distance, tt.name as transmissionName, p.doors,
vt.name as vehicleType, vb.name as vehicleBrand, p.model, p.engineSize, p.steering, p.seats, p.vehicleYear,
ft.name as fuelType, p.color, p.speed, p.moreDescription, p.contactInfo, p.contactMobile, p.contactEmail,
p.date
FROM `posts` p 
LEFT OUTER JOIN `transmissiontype` tt
on p.transmissionId = tt.id
LEFT OUTER JOIN `vehicle_type` vt
on p.typeId = vt.id
LEFT OUTER JOIN `vehicle_brand` vb
on p.brandId = vb.id
LEFT OUTER JOIN `fueltype` ft
on p.fuelId = ft.id
where p.id='$postid'";
$query = mysqli_query($connection, $sql);

?>

<div class="page-heading wow fadeIn" data-wow-duration="0.5s">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="heading-content-bg wow fadeIn" data-wow-delay="0.75s" data-wow-duration="1s">
					<div class="row">
						<div class="heading-content col-md-12">
							<p><a href="index.html">Homepage</a> / <em> Cars</em> / <em> Car Details</em></p>
							<h2>Car <em>Details</em></h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
while ($row = mysqli_fetch_assoc($query)) {
	echo '
	<div class="recent-car single-car wow fadeIn" data-wow-delay="0.5s" data-wow-duration="1s">
	<div class="container">
		<div class="recent-car-content">
			<div class="row">
				<div class="col-md-6">
					<div id="single-car" class="slider-pro">
					<div class="sp-slides">
					';
	$sql_images = "SELECT * from images where post_id ='$postid'";
	$query_img = mysqli_query($connection, $sql_images);
	$query_img_thumb = mysqli_query($connection, $sql_images);
	while ($row_img = mysqli_fetch_assoc($query_img)) {
		echo '	

							<div class="sp-slide">
								<img class="sp-image" src="http://localhost/usedmotorcars/uploads/post/' . $row_img["name"] . '" alt="" />
							</div>
	';
	}
	echo '						
					</div>
						<div class="sp-thumbnails">
						';
	while ($row_img_thumb = mysqli_fetch_assoc($query_img_thumb)) {
		echo '<img class="sp-thumbnail" src="http://localhost/usedmotorcars/uploads/post/' . $row_img_thumb["name"] . '" alt="" />';
	}
	echo '
						</div>
						';
	echo '
					</div>
				</div>
				<div class="col-md-6">
					<div class="car-details">
						<h4>' . $row["title"] . '</h4>
						<span>' . $row["amount"] . '</span>
						<p>' . $row["description"] . '</p>
						<div class="container">
							<div class="row">
								<ul class="car-info col-md-6">
									<li><i class="flaticon flaticon-calendar"></i>
										<p>' . $row['vehicleYear'] . '</p>
									</li>
									<li><i class="flaticon flaticon-speed"></i>
										<p>' . $row['speed'] . '</p>
									</li>
									<li><i class="flaticon flaticon-road"></i>
										<p>' . $row['distance'] . ' kms</p>
									</li>
									<li><i class="flaticon flaticon-fuel"></i>
										<p>' . $row['fuelType'] . '</p>
									</li>
								</ul>
								<ul class="car-info col-md-6">
									<li><i class="flaticon flaticon-art"></i>
										<p>' . $row['color'] . '</p>
									</li>
									<li><i class="flaticon flaticon-shift"></i>
										<p>' . $row['transmissionName'] . '</p>
									</li>
									<li><i class="flaticon flaticon-car"></i>
										<p>' . $row['doors'] . '</p>
									</li>
									<li><i class="flaticon flaticon-motor"></i>
										<p>' . $row['engineSize'] . '</p>
									</li>
								</ul>
							</div>
						</div>
						<div class="similar-info">
							<button class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal">Proceed</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<section>
	<div class="more-details">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="item wow fadeInUp" data-wow-duration="0.5s">
						<div class="sep-section-heading">
							<h2>More <em>Description</em></h2>
						</div>
						<p>' . $row["moreDescription"] . '</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="item wow fadeInUp" data-wow-duration="0.75s">
						<div class="sep-section-heading">
							<h2>Additional <em>Features</em></h2>
						</div>
						<div class="info-list">
							<ul>
								<li><i class="fa fa-check-square"></i><span>Neon lights under</span></li>
								<li><i class="fa fa-check-square"></i><span>ABS brakes</span></li>
								<li><i class="fa fa-check-square"></i><span>ESP</span></li>
								<li><i class="fa fa-check-square"></i><span>ESD</span></li>
								<li><i class="fa fa-check-square"></i><span>Anti-th</span></li>
								<li><i class="fa fa-check-square"></i><span>Tined glass</span></li>
								<li><i class="fa fa-check-square"></i><span>Alarm</span></li>
								<li><i class="fa fa-check-square"></i><span>Protection framework</span></li>
								<li><i class="fa fa-check-square"></i><span>Parking sensor</span></li>
								<li><i class="fa fa-check-square"></i><span>Electric windows</span></li>
								<li><i class="fa fa-check-square"></i><span>Electric mirrors</span></li>
								<li><i class="fa fa-check-square"></i><span>Xenon</span></li>
								<li><i class="fa fa-check-square"></i><span>Designed spoiler</span></li>
								<li><i class="fa fa-check-square"></i><span>Steering wheels control</span></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-4 wow fadeInUp" data-wow-duration="1s">
					<div class="item">
						<div class="sep-section-heading">
							<h2>Contact <em>Informations</em></h2>
						</div>
						<p>' . $row["contactInfo"] . '</p>
						<div class="contact-info">
							<div class="row">
								<div class="phone col-md-12 col-sm-6 col-xs-6">
									<i class="fa fa-phone"></i><span>' . $row["contactMobile"] . '</span>
								</div>
								<div class="mail col-md-12 col-sm-6 col-xs-6">
									<i class="fa fa-envelope"></i><span>' . $row["contactEmail"] . '	</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
	';
}
?>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">
					<span id="mainScreenHeader">Please choose the details for your quotation</span>
					<span id="secondaryScreenHeader">Send Us Your Enquiry...</span>
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="container" id="mainScreen">
					<div class="row">
						<div class="col-md-4">
							<p class="title">Country of Final Destination</p>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="countrySelect" class="title">Country where the vehicle will be used /registered</label>
								<select class="form-control" id="countrySelect">
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<p class="title">Port of Delivery</p>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="countrySelect" class="title">Port where the vehicle will be delivered</label>
								<select class="form-control" id="countrySelect">
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
								</select>
							</div>
						</div>
					</div>
					<div class="container">
						<div class="row">
							<p class="title">C&F INFORMATION</p>
						</div>
						<div class="row">
							<div class="col-md-3 charge-info-title">
								FOB price
							</div>
							<div class="col-md-2 charge-info">
								US$ 5,000
							</div>
						</div>
						<div class="row">
							<div class="col-md-3 charge-info-title">
								Freight (By Ro-Ro)
							</div>
							<div class="col-md-2 charge-info">
								US$ 0
							</div>
						</div>
						<br />
						<div class="row" style="margin-bottom: 15px;">
							<div class="col-md-3 charge-info-title">
								Total
							</div>
							<div class="col-md-2 total-charge">
								US$ 5,000
							</div>
						</div>
					</div>
					<button style="margin-bottom: 25px; float: right;" class="btn btn-secondary" onclick="continueProcess()">Continue</button>
				</div>
				<div class="container" id="secondaryScreen">
					<i class="fa fa-arrow-left" style="font-size: 20px;color: red;" onclick="continueProcess()"></i>
					<form>
						<div class="col-md-8 col-md-off-2">
							<div class="form-group">
								<label for="countrySelect" class="title">Name</label>
								<input type="text" class="form-control" />
							</div>
							<div class="form-group">
								<label for="countrySelect" class="title">E-mail</label>
								<input type="text" class="form-control" />
							</div>
							<div class="form-group">
								<label for="countrySelect" class="title">Telephone</label>
								<input type="text" class="form-control" />
							</div>
							<div class="form-group">
								<label for="countrySelect" class="title">Enquiry</label>
								<textarea type="text" class="form-control"></textarea>
							</div>
							<button type="submit" class="btn btn-primary">Submit</button>
							<button type="button" class="btn btn-secondary">Reset</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php include 'includes/footer.php'; ?>

	<script>
		$(document).ready(function() {
			var x = document.getElementById("secondaryScreen");
			var xx = document.getElementById("secondaryScreenHeader");
			x.style.display = "none";
			xx.style.display = "none";
		});

		function continueProcess() {
			var y = document.getElementById("secondaryScreen");
			var x = document.getElementById("mainScreen");
			var yy = document.getElementById("secondaryScreenHeader");
			var xx = document.getElementById("mainScreenHeader");
			if (x.style.display === "none") {
				x.style.display = "block";
				xx.style.display = "block";
				y.style.display = "none";
				yy.style.display = "none";
			} else {
				x.style.display = "none";
				xx.style.display = "none";
				y.style.display = "block";
				yy.style.display = "block";
			}
		}
	</script>