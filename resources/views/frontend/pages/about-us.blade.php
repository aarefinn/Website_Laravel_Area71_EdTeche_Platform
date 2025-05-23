@extends('frontend.layouts.master')

@section('title','Area71 || About Us')

@section('main-content')

	<!-- Breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="blog-single.html">About Us</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->

	<!-- About Us -->
	<section class="about-us section">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-12">
					<div class="about-content">
						@php
							$settings = DB::table('settings')->get();
						@endphp
						<h3 style="color: #142220;">Welcome To <span>Area71 Academy</span></h3>
						<p style="margin-top: 10px; font-size: 16px; color: #555;">
							Your journey to mastering Amazon eCommerce starts here. From expert training to hands-on support, 
							we equip you with the skills and strategies to succeed in the global marketplace. 
							Let’s build, scale, and thrive together!
						</p>
						<div class="button">
							<a href="{{ route('contact') }}" class="btn" style="background: #142220; color: #fff; padding: 10px 20px; border-radius: 5px;">Contact Us</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-12">
					<div class="about-img overlay" style="display: flex; align-items: center; justify-content: center;">
						<img src="{{ asset('storage/photos/1/poster99.webp') }}" alt="About Image" style="max-width: 100%; height: auto; border-radius: 10px;">
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="student-reviews section" style="background: #142220; padding: 50px 0;">
		<div class="container">
			<div class="row">
				<div class="col-12 text-center">
					<span style="display: inline-block; background: #142220; color: #F6D273; padding: 5px 15px; font-weight: bold; border-radius: 5px;">All in one</span>
					<h2 style="color: #fff; margin-top: 10px;">Hear It From Our Students</h2>
				</div>
			</div>
			<div class="row justify-content-center mt-4">
				<!-- Video 1 (Embedded iFrame) -->
				<div class="col-lg-4 col-md-6 col-12">
					<div class="video-iframe" style="position: relative; border-radius: 10px; overflow: hidden; aspect-ratio: 16/9;">
						<iframe width="100%" height="100%" src="https://www.youtube.com/embed/VfEulXEDSZs"
							title="Student Review 1"
							frameborder="0"
							allowfullscreen
							style="border-radius: 10px;">
						</iframe>
					</div>
				</div>

				<!-- Video 2 (Embedded iFrame) -->
				<div class="col-lg-4 col-md-6 col-12">
					<div class="video-iframe" style="position: relative; border-radius: 10px; overflow: hidden; aspect-ratio: 16/9;">
						<iframe width="100%" height="100%" src="https://www.youtube.com/embed/y6Mh8Ad5RO8"
							title="Student Review 2"
							frameborder="0"
							allowfullscreen
							style="border-radius: 10px;">
						</iframe>
					</div>
				</div>

				<!-- Video 3 (Embedded iFrame) -->
				<div class="col-lg-4 col-md-6 col-12">
					<div class="video-iframe" style="position: relative; border-radius: 10px; overflow: hidden; aspect-ratio: 16/9;">
						<iframe width="100%" height="100%" src="https://www.youtube.com/embed/LSt_a2OI3h0"
							title="Student Review 3"
							frameborder="0"
							allowfullscreen
							style="border-radius: 10px;">
						</iframe>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Counter Section -->
		<section class="counter-section" style="background: #F6D273; padding: 50px 0; text-align: center;">
			<div class="container">
				<div class="row">
					<!-- Counter 1 -->
					<div class="col-lg-3 col-md-6 col-12">
						<div class="counter-box">
							<h2 class="counter" data-target="3456" style="font-size: 40px; font-weight: 700; color: #142220;">0</h2>
							<p style="font-size: 16px; font-weight: 500; color: #333;">Total Students</p>
						</div>
					</div>

					<!-- Counter 2 -->
					<div class="col-lg-3 col-md-6 col-12">
						<div class="counter-box">
							<h2 class="counter" data-target="500" style="font-size: 40px; font-weight: 700; color: #142220;">0</h2>
							<p style="font-size: 16px; font-weight: 500; color: #333;">Total Topics</p>
						</div>
					</div>

					<!-- Counter 3 -->
					<div class="col-lg-3 col-md-6 col-12">
						<div class="counter-box">
							<h2 class="counter" data-target="1032" style="font-size: 40px; font-weight: 700; color: #142220;">0</h2>
							<p style="font-size: 16px; font-weight: 500; color: #333;">Success Students</p>
						</div>
					</div>

					<!-- Counter 4 -->
					<div class="col-lg-3 col-md-6 col-12">
						<div class="counter-box">
							<h2 class="counter" data-target="44000" style="font-size: 40px; font-weight: 700; color: #142220;">0</h2>
							<p style="font-size: 16px; font-weight: 500; color: #333;">Total Followers</p>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- Counter JS -->
		<script>
			document.addEventListener("DOMContentLoaded", function () {
				const counters = document.querySelectorAll(".counter");
				const speed = 200; // Speed of counter animation

				counters.forEach(counter => {
					const updateCount = () => {
						const target = +counter.getAttribute("data-target");
						const count = +counter.innerText;

						const increment = target / speed;

						if (count < target) {
							counter.innerText = Math.ceil(count + increment);
							setTimeout(updateCount, 10);
						} else {
							counter.innerText = target;
						}
					};

					updateCount();
				});
			});
		</script>


	<!-- End About Us -->



@endsection
