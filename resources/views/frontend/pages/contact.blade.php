@extends('frontend.layouts.master')

@section('title','Area71 || Contact')

@section('main-content')
	<!-- Breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="{{route('home')}}">Home<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="javascript:void(0);">Contact</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->
  
	<!-- Start Contact -->
	<section id="contact-us" class="contact-us section">
		<div class="container">
			<div class="contact-head">
				<div class="row">
					<div class="col-lg-8 col-12">
						<div class="form-main">
							<div class="title">
								<h4>Get in touch</h4>
								<h3>Write us a message @auth @else @endauth</h3>
							</div>
							<form class="form-contact form contact_form" method="post" action="{{route('contact.store')}}" id="contactForm" novalidate="novalidate">
								@csrf
								<div class="row">
									<div class="col-lg-6 col-12">
										<div class="form-group">
											<label>Your Name<span>*</span></label>
											<input name="name" id="name" type="text" placeholder="Enter your name">
										</div>
									</div>
									<div class="col-lg-6 col-12">
										<div class="form-group">
											<label>Your Subjects<span>*</span></label>
											<input name="subject" type="text" id="subject" placeholder="Enter Subject">
										</div>
									</div>
									<div class="col-lg-6 col-12">
										<div class="form-group">
											<label>Your Email<span>*</span></label>
											<input name="email" type="email" id="email" placeholder="Enter email address">
										</div>	
									</div>
									<div class="col-lg-6 col-12">
										<div class="form-group">
											<label>Your Phone<span>*</span></label>
											<input id="phone" name="phone" type="number" placeholder="Enter your phone">
										</div>	
									</div>
									<div class="col-12">
										<div class="form-group message">
											<label>Your Message<span>*</span></label>
											<textarea name="message" id="message" cols="30" rows="9" placeholder="Enter Message"></textarea>
										</div>
									</div>
									<div class="col-12">
										<div class="form-group button">
											<button type="submit" class="btn ">Send Message</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>

					<!-- Static Contact Info -->
					<div class="col-lg-4 col-12">
						<div class="single-head">
							<div class="single-info">
								<i class="fa fa-phone"></i>
								<h4 class="title">Call us Now:</h4>
								<ul>
									<li> +8809613247171</li>
								</ul>
							</div>
							<div class="single-info">
								<i class="fa fa-envelope-open"></i>
								<h4 class="title">Email:</h4>
								<ul>
									<li> <a href="mailto:info@area71bd.com">info@area71bd.com</a></li>
								</ul>
							</div>
							<div class="single-info">
								<i class="fa fa-location-arrow"></i>
								<h4 class="title">Our Address:</h4>
								<ul>
									<li> Uttara, Dhaka, Bangladesh</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- End Static Contact Info -->

				</div>
			</div>
		</div>
	</section>
	<!--/ End Contact -->
	
	<!-- Map Section -->
	<div class="map-section">
		<div id="myMap">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3648.2092936614416!2d90.38883551536397!3d23.87501128906226!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c416ecf91e3b%3A0x6c9d08c3fdb5c87!2sUttara%2C%20Dhaka%2C%20Bangladesh!5e0!3m2!1sen!2sbd!4v1706923456789!5m2!1sen!2sbd" 
				width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0">
			</iframe>
		</div>
	</div>
	<!--/ End Map Section -->

	
	<!-- Success & Error Modals -->
	<div class="modal fade" id="success" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
		  <div class="modal-content">
			<div class="modal-header">
				<h2 class="text-success">Thank you!</h2>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p class="text-success">Your message is successfully sent...</p>
			</div>
		  </div>
		</div>
	</div>

	<div class="modal fade" id="error" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
		  <div class="modal-content">
			<div class="modal-header">
				<h2 class="text-warning">Sorry!</h2>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p class="text-warning">Something went wrong.</p>
			</div>
		  </div>
		</div>
	</div>

@endsection

@push('scripts')
<script src="{{ asset('frontend/js/jquery.form.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('frontend/js/contact.js') }}"></script>
@endpush
