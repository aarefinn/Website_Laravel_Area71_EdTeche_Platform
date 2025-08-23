@extends('frontend.layouts.master')

@section('meta')
    <meta name="description" content="Area71 Academy - Professional Training Courses">
@endsection

@section('title','Area71 Academy || Courses')

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

    <!-- Course Section -->
    <section class="course-section section">
        <div class="container">
            <!-- Section Header -->
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <span class="badge section-badge">
                        Unlock Your Potential
                    </span>

                    <h2 class="section-title mt-2">
                        Gain In-Demand Skills & Elevate Your Career
                    </h2>

                    <p class="section-description mt-2">
                        Learn from industry experts and master the strategies to thrive in the global digital marketplace.
                    </p>
                </div>
            </div>

            @if(count($courses) > 0)
                <div class="row">
                    @foreach($courses as $course)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100 course-card">
                                <div class="course-img position-relative">
                                    @php
                                        $imageName = match($course->title) {
                                            'Amazon FBA A-Z Mastery' => 'amazon-fba-mastery.png',
                                            'Supply Chain & Global Sourcing Mastery' => 'Supply-Chain.png',
                                            'Daraz Seller Mastery' => 'daraz.png',
                                            default => 'placeholder.png'
                                        };
                                    @endphp
                                    <img src="{{ asset($course->photo) }}" alt="{{ $course->title }}" class="card-img-top" style="height:220px;object-fit:cover;">
                                    @if($course->discount > 0)
                                        <div class="position-absolute top-0 end-0 discount-badge">
                                            Save {{ number_format(($course->discount / $course->price) * 100, 0) }}%
                                        </div>
                                    @endif
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title mb-3">
                                        <a href="{{ route('course.details', $course->slug) }}" class="course-title-link">
                                            {{ $course->title }}
                                        </a>
                                    </h4>
                                    
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div class="course-info">
                                            <span><i class="fa fa-clock me-2"></i>{{ $course->duration }}</span>
                                        </div>
                                        <div class="instructor">
                                            <span><i class="fa fa-user me-2"></i>{{ $course->instructor }}</span>
                                        </div>
                                    </div>

                                    <div class="course-price mb-3">
                                        @if($course->discount > 0)
                                            <span class="original-price">৳{{ number_format($course->price, 2) }}</span>
                                            <span class="discounted-price">৳{{ number_format($course->price - $course->discount, 2) }}</span>
                                        @else
                                            <span class="current-price">৳{{ number_format($course->price, 2) }}</span>
                                        @endif
                                    </div>

                                    <p class="card-text">{{ Str::limit($course->description, 100) }}</p>
                                </div>
                                <div class="card-footer">
                                    <div class="d-grid">
                                        <a href="{{ route('course.details', $course->slug) }}" class="btn btn-primary">VIEW DETAILS</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="row mt-4">
                    <div class="col-12 d-flex justify-content-center">
                        {{ $courses->links() }}
                    </div>
                </div>
            @else
                <div class="text-center py-5">
                    <h3>No courses available at the moment.</h3>
                    <p>Please check back later for our upcoming courses.</p>
                </div>
            @endif
        </div>
    </section>
    <!-- End Course Section -->
@endsection

@push('styles')
<style>
    /* Section Styles */
    .section-badge {
        background: #F6D273;
        color: #142220;
        padding: 8px 18px;
        font-size: 20px;
        font-weight: bold;
        border-radius: 30px;
        display: inline-block;
        margin-bottom: 1rem;
    }

    .section-title {
        color: #142220;
        font-size: 36px;
        font-weight: 800;
        line-height: 1.3;
        margin-bottom: 1rem;
    }

    .section-description {
        color: #555;
        font-size: 18px;
        font-weight: 500;
        max-width: 650px;
        margin: auto;
        margin-bottom: 3rem;
    }

    /* Course Card Styles */
    .course-card {
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        border: none;
        background: #142220;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        border-radius: 12px;
        overflow: hidden;
    }

    .course-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
    }

    /* Course Image */
    .course-img {
        position: relative;
        overflow: hidden;
    }

    .course-img img {
        transition: transform 0.5s;
        width: 100%;
    }

    .course-card:hover .course-img img {
        transform: scale(1.05);
    }

    /* Discount Badge */
    .discount-badge {
        background: #ff4444;
        color: white;
        padding: 6px 12px;
        border-radius: 20px;
        font-weight: bold;
        font-size: 14px;
        margin: 10px;
    }

    /* Course Title */
    .course-title-link {
        color: #F6D273 !important;
        text-decoration: none;
        font-size: 20px;
        font-weight: bold;
        display: block;
        margin-bottom: 15px;
    }

    .course-title-link:hover {
        color: #ffd700 !important;
    }

    /* Course Info */
    .course-info span, .instructor span {
        color: #a8a8a8;
        font-size: 14px;
    }

    .course-info i, .instructor i {
        color: #F6D273;
    }

    /* Price Styles */
    .original-price {
        color: #888;
        text-decoration: line-through;
        margin-right: 10px;
        font-size: 16px;
    }

    .discounted-price, .current-price {
        color: #F6D273;
        font-size: 24px;
        font-weight: bold;
    }

    /* Description */
    .card-text {
        color: #a8a8a8 !important;
        line-height: 1.6;
        margin-bottom: 20px;
    }

    /* Button Styles */
    .card-footer {
        background: transparent;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        padding: 20px;
    }

    .btn-primary {
        background: #F6D273;
        color: #142220;
        font-weight: bold;
        border: none;
        padding: 12px 25px;
        font-size: 16px;
        letter-spacing: 1px;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background: #ffd700;
        color: #142220;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(246, 210, 115, 0.3);
    }

    /* Pagination */
    .pagination {
        justify-content: center;
        margin-top: 3rem;
    }
</style>
@endpush
