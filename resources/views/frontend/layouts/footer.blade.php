
	<!-- Start Footer Area -->
	<footer class="footer">
		<!-- Footer Top -->
		<div class="footer-top section">
			<div class="container">
				<div class="row justify-content-center text-center"> <!-- Center Content -->
					<div class="col-lg-5 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer about">
							<div class="logo">
								<a href="{{ route('home') }}">
									<img src="{{ asset('storage/photos/1/logofooter.png') }}" alt="Area71 Logo">
								</a>
							</div>
							
							<p class="call">Got Questions? Call us 24/7
								<span><a href="tel:+8809613247171">
								</a></span>
							</p>
						</div>
					</div>

					<!-- Information Links -->
					<div class="col-lg-2 col-md-6 col-12">
						<div class="single-footer links text-left">
							<h4>Information</h4>
							<ul>
								<li><a href="{{ route('home') }}">Home</a></li>
								<li><a href="{{ route('course.page') }}">Courses</a></li>
								<li><a href="{{ route('about-us') }}">About Us</a></li>
								<li><a href="{{ route('contact') }}">Contact Us</a></li>
							</ul>
						</div>
					</div>

					<!-- Address & Contact Info -->
					<div class="col-lg-3 col-md-6 col-12">
						<div class="single-footer social text-left">
							<h4>Address</h4>
							<div class="contact">
								<ul style="list-style: none; padding: 0;">
									<li style="display: flex; align-items: center; gap: 8px;">
										<i class="fa fa-phone"></i>
										<a href="tel:+8809613247171" style="text-decoration: none; color: white;">
											+8809613247171
										</a>
									</li>
									<li style="display: flex; align-items: center; gap: 8px; margin-top: 5px;">
										<i class="fa fa-envelope"></i>
										<a href="mailto:info@area71bd.com" style="text-decoration: none; color: white;">
											info@area71bd.com
										</a>
									</li>
									<li style="display: flex; align-items: center; gap: 8px; margin-top: 5px;">
										<i class="fa fa-map-marker"></i>
										<span>Uttara, Dhaka, Bangladesh</span>
									</li>
								</ul>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
		<!-- End Footer Top -->
		<div class="copyright">
			<div class="container">
				<div class="row align-items-center justify-content-between">
					<div class="col-md-6 text-md-left text-center">
						<p>
							Copyright © {{ date('Y') }} Area71 Venture Limited - All Rights Reserved.
						</p>
					</div>
					<div class="col-md-6 text-md-right text-center">
						<img src="{{ asset('backend/img/payments.png') }}" alt="Payments" class="payment-icons">
					</div>
				</div>
			</div>
		</div>

	</footer>
	<!-- /End Footer Area -->

 
	<!-- Jquery -->
    <script src="{{asset('frontend/js/jquery.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery-migrate-3.0.0.js')}}"></script>
	<script src="{{asset('frontend/js/jquery-ui.min.js')}}"></script>
	<!-- Popper JS -->
	<script src="{{asset('frontend/js/popper.min.js')}}"></script>
	<!-- Bootstrap JS -->
	<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
	<!-- Color JS -->
	<script src="{{asset('frontend/js/colors.js')}}"></script>
	<!-- Slicknav JS -->
	<script src="{{asset('frontend/js/slicknav.min.js')}}"></script>
	<!-- Owl Carousel JS -->
	<script src="{{asset('frontend/js/owl-carousel.js')}}"></script>
	<!-- Magnific Popup JS -->
	<script src="{{asset('frontend/js/magnific-popup.js')}}"></script>
	<!-- Waypoints JS -->
	<script src="{{asset('frontend/js/waypoints.min.js')}}"></script>
	<!-- Countdown JS -->
	<script src="{{asset('frontend/js/finalcountdown.min.js')}}"></script>
	<!-- Nice Select JS -->
	<script src="{{asset('frontend/js/nicesellect.js')}}"></script>
	<!-- Flex Slider JS -->
	<script src="{{asset('frontend/js/flex-slider.js')}}"></script>
	<!-- ScrollUp JS -->
	<script src="{{asset('frontend/js/scrollup.js')}}"></script>
	<!-- Onepage Nav JS -->
	<script src="{{asset('frontend/js/onepage-nav.min.js')}}"></script>
	{{-- Isotope --}}
	<script src="{{asset('frontend/js/isotope/isotope.pkgd.min.js')}}"></script>
	<!-- Easing JS -->
	<script src="{{asset('frontend/js/easing.js')}}"></script>

	<!-- Active JS -->
	<script src="{{asset('frontend/js/active.js')}}"></script>

	
	@stack('scripts')
	<script>
		setTimeout(function(){
		  $('.alert').slideUp();
		},5000);
		$(function() {
		// ------------------------------------------------------- //
		// Multi Level dropdowns
		// ------------------------------------------------------ //
			$("ul.dropdown-menu [data-toggle='dropdown']").on("click", function(event) {
				event.preventDefault();
				event.stopPropagation();

				$(this).siblings().toggleClass("show");


				if (!$(this).next().hasClass('show')) {
				$(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
				}
				$(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
				$('.dropdown-submenu .show').removeClass("show");
				});

			});
		});
	  </script>