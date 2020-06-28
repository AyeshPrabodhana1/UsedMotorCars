<?php
ob_start();
require_once "util/connection.php";

$sql_post = "SELECT * FROM posts";
$query_list = mysqli_query($connection, $sql_post);

?>

<section>
	<div class="recent-cars">
		<div class="container">
			<div class="recent-car-content">
				<div class="row">
					<div class="col-md-12">
						<div class="section-heading">
							<div class="icon">
								<i class="fa fa-car"></i>
							</div>
							<div class="text-content">
								<h2>New Arrivals</h2>
								<span>Check our newly arrived vehicles</span>
							</div>
						</div>
					</div>
				</div>
				<div class="row">

					<?php
					while ($row = mysqli_fetch_array($query_list)) {
						echo '

					<div class="col-md-4 col-sm-6">
						<div class="car-item wow fadeIn" data-wow-duration="0.75s">
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
                                                    <a href="detail.php?id=' . $row["id"] . '"><img src="http://localhost/usedmotorcars/uploads/post/' . $firstrow["name"] . '" alt=""></a>
                                                    ';
						echo '
                        	</div>
							</div>
							<div class="down-content">
								<a href="detail.php?id=' . $row["id"] . '">
									<h4>' . $row['title'] . '</h4>
								</a>
								<span>' . $row['amount'] . '</span>
								<p class="wrap_description">' . $row['description'] . '</p>
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
					
					
					';
					}

					?>
				</div>
			</div>
		</div>
	</div>
</section>