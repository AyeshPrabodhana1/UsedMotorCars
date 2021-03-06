<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="footer-item">
						<div class="about-us">
							<h2>About Us</h2>
							<p>Used Motorcars have been around since before the internet, its longstanding reputation has built up decades of trust.</p>
							<ul>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-2">
					<div class="footer-item">
						<div class="what-offer">
							<h2>What We Offer ?</h2>
							<ul>
								<li><a href="#">Shipping</a></li>
								<li><a href="#">Documentation</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-2">
					<div class="footer-item">
						<div class="need-help">
							<h2>Need Help ?</h2>
							<ul>
								<li><a href="#">Find Cars</a></li>
								<li><a href="#">How to Buy</a></li>
								<li><a href="#">FAQ</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-2">
					<div class="footer-item">
						<div class="our-gallery">
							<h2>Our Gallery</h2>
							<ul>
								<li><a href="#"><img src="http://placehold.it/70x70" alt=""></a></li>
								<li><a href="#"><img src="http://placehold.it/70x70" alt=""></a></li>
								<li><a href="#"><img src="http://placehold.it/70x70" alt=""></a></li>
								<li><a href="#"><img src="http://placehold.it/70x70" alt=""></a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="footer-item">
						<div class="quick-search">
							<h2>Contact Info</h2>
							<p>Tel : +81-52-351-5541</p>
							<p>Fax : +81-52-351-5542</p>
							<p>+81-503-730-0844 (Direct-Sales Div)</p>
							<p>sales@used-motorcars.com</p>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="sub-footer">
						<p>Copyright 2020. All rights reserved by: <a href="javascript:void(0)" >Movek International LTD</a></p>
					</div>
				</div>
			</div>
		</div>
	</footer>
	

	<script src="assets/js/jquery-1.11.0.min.js"></script>

	<!-- Slider Pro Js -->
	<script src="assets/js/sliderpro.min.js"></script>

	<!-- Slick Slider Js -->
	<script src="assets/js/slick.js"></script>

	<!-- Owl Carousel Js -->
    <script src="assets/js/owl.carousel.min.js"></script>

	<!-- Boostrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Boostrap Js -->
    <script src="assets/js/wow.animation.js"></script>

	<!-- Custom Js -->
    <script src="assets/js/custom.js"></script>

    <!-- Google Map -->
    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script src="assets/js/jquery.gmap3.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	<!-- Google Map Init-->
   <script>
		// Initialize and add the map
		function initMap() {
		  // The location of Uluru
		  var uluru = {lat: 50.688363, lng: 10.436397};
		  // The map, centered at Uluru
		  var map = new google.maps.Map(
		      document.getElementById('map'), {zoom: 4, center: uluru});
		  // The marker, positioned at Uluru
		  var marker = new google.maps.Marker({position: uluru, map: map});
		}
    </script>
    <!--Load the API from the specified URL
    * The async attribute allows the browser to render the page while the API loads
    * The key parameter will contain your own API key (which is not needed for this tutorial)
    * The callback parameter executes the initMap() function
    -->
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap">
    </script>

</body>
</html>