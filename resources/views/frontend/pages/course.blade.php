@extends('frontend.layouts.master')

@section('title', 'Area71 || Courses')

@section('main-content')

<!-- Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="{{ route('home') }}">Home<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="{{ route('course.page') }}">Courses</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- Courses Section -->
<section class="courses section">
    <div class="container">
        <!-- Section Header -->
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <span class="badge" 
                    style="background: #F6D273; color: #142220; padding: 8px 18px; font-size: 20px; font-weight: bold; border-radius: 30px; display: inline-block;">
                    Unlock Your Potential
                </span>

                <h2 class="mt-2" 
                    style="color: #142220; font-size: 30px; font-weight: 800; line-height: 1.3;">
                    Gain In-Demand Skills & Elevate Your Career
                </h2>

                <p class="mt-2" 
                    style="color: #666; font-size: 16px; font-weight: 500; max-width: 650px; margin: auto;">
                    Learn from industry experts and master the strategies to thrive in the global digital marketplace.
                </p>
            </div>
        </div>

        @if($courses->count() > 0)
            <div class="row justify-content-center mt-4">
                @foreach($courses as $index => $course)
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-4 d-flex">
                        <div class="course-item d-flex flex-column justify-content-between" 
                            style="background: #142220; border-radius: 12px; overflow: hidden; padding: 20px; text-align: center; width: 100%; height: 100%; box-shadow: 0 4px 10px rgba(255, 255, 255, 0.1); transition: 0.3s;">
                            
                            <!-- Course Image -->
                            <div class="course-img" style="border-radius: 10px; overflow: hidden;">
                                <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->title }}" 
                                    style="width: 100%; border-radius: 10px; transition: transform 0.3s;">
                            </div>
                            
                            <!-- Course Content -->
                            <div class="course-content mt-4 flex-grow-1">  
                                <h3 style="color: #F6D273; font-size: 20px; font-weight: bold; margin-bottom: 10px;">
                                    {{ $course->title }}
                                </h3>
                                <p style="color: #ccc; font-size: 14px; margin-bottom: 15px; line-height: 1.6;">
                                    {{ Str::limit($course->description, 100, '...') }}
                                </p>
                            </div>

                            <!-- Course Price & Buy Button -->
                            <div style="margin-top: 20px;"> 
                                <p style="color: #fff; font-size: 18px; font-weight: bold; margin-bottom: 10px;">
                                    Price: <span style="color: #F6D273;">${{ $course->price }}</span>
                                </p>
                                <form action="{{ route('course.addToCart', $course->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" style="background: #F6D273; color: #142220; font-size: 16px; font-weight: bold; padding: 12px 20px; border: none; border-radius: 6px; cursor: pointer; transition: 0.3s;">
                                        Buy Now
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    @if(($index + 1) % 4 == 0)  
                        </div><div class="row justify-content-center mt-4">  
                    @endif

                @endforeach
            </div>
        @else
            <div class="row">
                <div class="col-12 text-center">
                    <p style="color: #F6D273; font-size: 18px; font-weight: bold; margin-top: 20px;">No courses available at the moment.</p>
                </div>
            </div>
        @endif
    </div>
</section>
<!-- End Courses Section -->

@endsection
