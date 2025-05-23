@extends('frontend.layouts.master')

@section('title', 'Area71 || HOME PAGE')

@section('main-content')

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <!-- Left Content -->
            <div class="col-lg-6 col-md-12">
                <div class="hero-text">
                <span style="
                        background: #F6D273;
                        color: #142220;
                        padding: 10px 20px;
                        font-weight: bold;
                        display: inline-block;
                        border-radius: 5px;
                        text-align: center;
                        box-shadow: 4px 4px 10px rgba(246, 210, 115, 0.8);
                    ">
                        FIRST AUTHORIZED AMAZON SPN PARTNER
                    </span>
                    <h1 style="color: #142220;">Welcome to Area71 Academy – Your Gateway to Amazon Success</h1>
                    <p>Join thousands of successful sellers and master the art of selling on Amazon with industry-leading training.</p>
                    <div class="hero-buttons">
                        <a href="{{ route('course.page') }}" class="btn btn-primary">Explore Courses</a>
                        <a href="{{ route('about-us') }}" class="btn btn-secondary">Learn More</a>
                    </div>
                </div>
            </div>

            <!-- Right Image -->
            <div class="col-lg-6 col-md-12">
                <div class="hero-image">
                    <img src="{{ asset('storage/photos/1/bg_2-01.webp') }}" alt="Hero Image">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Platforms Section -->
<section class="platforms-section">
    <div class="container text-center">
        <button class="btn btn-dark learn-btn">Learn | Master | Succeed</button>
        <h2 class="platforms-title">PLATFORMS YOU WILL MASTER</h2>
        <div class="platform-logos">
            <img src="{{ asset('storage/photos/1/upwork.png') }}" alt="Upwork">
            <img src="{{ asset('storage/photos/1/meta.png') }}" alt="Meta">
            <img src="{{ asset('storage/photos/1/alibaba.png') }}" alt="Alibaba">
            <img src="{{ asset('storage/photos/1/daraz.png') }}" alt="Daraz">
            <img src="{{ asset('storage/photos/1/amazon.png') }}" alt="Amazon">
            <img src="{{ asset('storage/photos/1/fiverr.png') }}" alt="Fiverr">
        </div>
    </div>

    <!-- Add space between logos and videos -->
    <div class="spacer"></div>

    <!-- Video Carousel -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 video-container">
                <iframe width="100%" height="250" src="https://www.youtube.com/embed/XaQRozC9wXA" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="col-md-4 video-container">
                <iframe width="100%" height="250" src="https://www.youtube.com/embed/FRL900IbqAU" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="col-md-4 video-container">
                <iframe width="100%" height="250" src="https://www.youtube.com/embed/XTnHHvbriK4" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</section>

<!-- Training Program Section -->
<section class="training-section">
    <div class="container">
        <div class="row align-items-center">
            <!-- Video -->
            <div class="col-md-6">
                <iframe width="100%" height="315" src="https://www.youtube.com/embed/aVlOk4isB-A" frameborder="0" allowfullscreen></iframe>
            </div>
            <!-- Text Content -->
            <div class="col-md-6">
                <button class="btn btn-dark training-btn">Learn Business with Our</button>
                <h2 class="training-title">Training Program</h2>
                <p>
                    Area71 Academy, the first Amazon SPN Partner in Bangladesh, offers top-tier training in e-commerce and global business.
                    Our goal is to empower entrepreneurs to achieve financial independence and inspire others. With expert-led programs, we provide
                    the skills needed to succeed in the online marketplace. Join us to turn your entrepreneurial dreams into reality and build a successful future.
                </p>
                <a href="{{ route('course.page') }}" class="btn btn-primary">More</a>
            </div>
        </div>
    </div>
</section>


@endsection

