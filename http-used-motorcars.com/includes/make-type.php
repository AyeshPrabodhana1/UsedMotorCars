<?php
ob_start();
require_once "util/connection.php";

$sql_make = "SELECT * FROM vehicle_brand";
$query_make = mysqli_query($connection, $sql_make);

$sql_type = "SELECT * FROM vehicle_type";
$query_type = mysqli_query($connection, $sql_type);
?>

<section class="car0=-browse-make-type-sec">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="car-browse-make-type">
					<h5 class="text-light-black">
						Browse by <span class="text-blue">Category</span>
					</h5>
					<ul class="make">
						<?php
						while ($row_make = mysqli_fetch_array($query_make)) {
							echo '
								<li class="make-type">
									<a href="list.php?brand='. $row_make['id'] .'" class="text-light-black">
										<span>
											<img src="../uploads/brand/' . $row_make["image"] . '" class="img-fluid" alt="brand-logo"/>
									 	</span>
									 	' . $row_make["name"] . '
									</a>
								</li>
								';
						}
						?>
					</ul>
				</div>
			</div>
			<div class="col-md-6">
				<div class="car-browse-make-type">
					<h5 class="text-light-black">
						Browse by <span class="text-blue">Type</span>
					</h5>
					<ul class="make">
						<?php
							while($row_type = mysqli_fetch_array($query_type)) {
								echo '
								<li class="make-type">
									<a href="list.php?type='. $row_type['id'] .'" class="text-light-black">
										<span>
											<img src="../uploads/type/'. $row_type['image'] .'" class="img-fluid" alt="brand-logo" />
										</span>
										'. $row_type['name'] .'
									</a>
								</li>
								';
							}
						?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>