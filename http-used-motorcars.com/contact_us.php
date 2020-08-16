<?php include 'includes/head.php'; ?>
<?php include 'includes/loader.php'; ?>
<?php include 'includes/navigation.php'; ?>

<?php
ob_start();
require_once "util/connection.php";
?>

<div class="page-heading wow fadeIn" data-wow-duration="0.5s">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="heading-content-bg wow fadeIn" data-wow-delay="0.75s" data-wow-duration="1s">
					<div class="row">
						<div class="heading-content col-md-12">
							<p><a href="index.html">Homepage</a> / <em> Contact Us</em></p>
							<h2>Contact <em>Us</em></h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="contact-us wow fadeIn" data-wow-delay="0.5s" data-wow-duration="1s">
	<div id="map"></div>
</div>

<section>
	<div class="contact-content wow fadeIn" data-wow-delay="0.5s" data-wow-duration="1s">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="send-message">
						<div class="sep-section-heading">
							<h2>Send Us <em>Message</em></h2>
						</div>
						<form method="post">
							<div class="row">
								<div class=" col-md-4 col-sm-4 col-xs-6">
									<input type="text" class="blog-search-field" name="name" placeholder="Your name..." required>
								</div>
								<div class="col-md-4 col-sm-4 col-xs-6">
									<input type="text" class="blog-search-field" name="email" placeholder="Your email..." required>
								</div>
								<div class="col-md-4 col-sm-4 col-xs-12">
									<input type="text" class="subject" name="subject" placeholder="Subject..." required>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12 col-sm-12">
									<textarea id="message" class="input" name="message" placeholder="Message..." required></textarea>
								</div>
							</div>
							<div class="row">
								<div class="submit-coment col-md-12">
									<div class="primary-button">
										<button class="contact-us-submit" type="submit" name="SubmitButton">Send now <i class="fa fa-paper-plane"></i></button> </div>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="col-md-4">
					<div class="contact-info">
						<div class="sep-section-heading">
							<h2>MIL SALES STAFF AND <em>CONTACT DETAILS.</em></h2>
						</div>
						<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingOne">
									<h4 class="panel-title">
										<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
											Sidney Buddhi</span>
										</a>
									</h4>
								</div>
								<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
									<div class="panel-body">
										<div class="info-list">
											<ul>
												<li><i class="fa fa-phone"></i><span>+81-52-351-5541 (Sales-direct)</span></li>
												<li><i class="fa fa-fax"></i><span>+81-52-351-5542 (Sales-direct)</span></li>
												<li><i class="fa fa-phone"></i><span>+81-903-586-0327</span></li>
												<li><i class="fa fa-envelope"></i><span>Sidney@used-motorcars.com</span></li>
											</ul>
										</div>
									</div>
								</div>

								<div class="panel-heading" role="tab" id="headingTwo" style="margin-top: 25px;">
									<h4 class="panel-title">
										<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
											Zuhura Pakeer</span>
										</a>
									</h4>
								</div>
								<div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
									<div class="panel-body">
										<div class="info-list">
											<ul>
												<li><i class="fa fa-phone"></i><span>+81-52-351-5541</span></li>
												<li><i class="fa fa-fax"></i><span>+81-52-351-5542</span></li>
												<li><i class="fa fa-phone"></i><span>+81-804-978-0020</span></li>
												<li><i class="fa fa-envelope"></i><span>Zuhura@used-motorcars.com</span></li>
											</ul>
										</div>
									</div>
								</div>

								<div class="panel-heading" role="tab" id="headingThree" style="margin-top: 25px;">
									<h4 class="panel-title">
										<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
											Kazumi Arita</span>
										</a>
									</h4>
								</div>
								<div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
									<div class="panel-body">
										<div class="info-list">
											<ul>
												<li><i class="fa fa-phone"></i><span>+81-52-351-5541</span></li>
												<li><i class="fa fa-fax"></i><span>+81-52-351-5542</span></li>
												<li><i class="fa fa-phone"></i><span>+81-903-30-01117</span></li>
												<li><i class="fa fa-envelope"></i><span>Kazumi@used-motorcars.com</span></li>
											</ul>
										</div>
									</div>
								</div>

								<div class="panel-heading" role="tab" id="headingFour" style="margin-top: 25px;">
									<h4 class="panel-title">
										<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
											Akira Sawada</span>
										</a>
									</h4>
								</div>
								<div id="collapseFour" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingFour">
									<div class="panel-body">
										<div class="info-list">
											<ul>
												<li><i class="fa fa-phone"></i><span>+81-52-351-5541</span></li>
												<li><i class="fa fa-fax"></i><span>+81-52-351-5542</span></li>
												<li><i class="fa fa-phone"></i><span>+81-909-196-0640</span></li>
												<li><i class="fa fa-envelope"></i><span>Sawada@used-motorcars.com</span></li>
											</ul>
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
</section>


<?php include 'includes/footer.php'; ?>