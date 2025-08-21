@extends('user.layouts.master')

@section('main-content')
<div class="container-fluid">
    @include('user.layouts.notification')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Welcome to Your Dashboard, {{ $user->name ?? 'User' }}!</h1>
    </div>

    <!-- Stats Row -->
    <div class="row">
        <!-- Total Orders -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Orders</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalOrders ?? 0 }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Spent -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Spent</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">${{ number_format($totalSpent ?? 0, 2) }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Enrolled Courses -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Enrolled Courses</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ count($enrolledCourses ?? []) }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-graduation-cap fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Account Status -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Account Status</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                @if(isset($user) && $user->status == 'active')
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">Inactive</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Enrolled Courses Section -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Your Courses</h6>
                </div>
                <div class="card-body">
                    @if(count($enrolledCourses) > 0)
                        <div class="row">
                            @foreach($enrolledCourses as $course)
                                <div class="col-md-4 mb-4">
                                    <div class="card h-100">
                                        <img src="{{ asset('storage/photos/1/' . $course->image) }}" class="card-img-top" alt="{{ $course->title }}">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $course->title }}</h5>
                                            <p class="card-text">{{ Str::limit($course->description, 100) }}</p>
                                        </div>
                                        <div class="card-footer">
                                            <a href="#" class="btn btn-sm btn-info">View Course</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="alert alert-info">
                            You haven’t purchased any course yet.
                        </div>
                        <a href="{{ route('course.page') }}" class="btn btn-primary">Browse Courses</a>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@push('styles')
<style>
    .card-img-top {
        height: 200px;
        object-fit: cover;
    }
</style>
@endpush
