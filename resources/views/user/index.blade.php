@extends('user.layouts.master')

@section('main-content')
<div class="container-fluid">
    @include('user.layouts.notification')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Welcome, {{ $user->name }}!</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
      <!-- Total Orders -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Orders</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalOrders }}</div>
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
                <div class="h5 mb-0 font-weight-bold text-gray-800">${{ number_format($totalSpent, 2) }}</div>
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
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ count($enrolledCourses) }}</div>
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
                  @if($user->status == 'active')
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
    @if(count($enrolledCourses) > 0)
    <div class="row">
      <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">My Enrolled Courses</h6>
          </div>
          <div class="card-body">
            <div class="row">
              @foreach($enrolledCourses as $course)
              <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                  @if($course->photo)
                    <img class="card-img-top" src="{{ asset('storage/'.$course->photo) }}" alt="{{ $course->title }}">
                  @endif
                  <div class="card-body">
                    <h5 class="card-title">{{ $course->title }}</h5>
                    <p class="card-text">{{ Str::limit($course->description, 100) }}</p>
                    <p class="card-text"><strong>Price: ${{ number_format($course->price, 2) }}</strong></p>
                  </div>
                  <div class="card-footer">
                    <a href="#" class="btn btn-primary btn-sm">Continue Learning</a>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
    @endif

    <!-- Recent Orders Section -->
    <div class="row">
      <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Recent Orders</h6>
          </div>
          <div class="card-body">
            @if(count($orders) > 0)
              <div class="table-responsive">
                <table class="table table-bordered" id="order-dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>S.N.</th>
                      <th>Order No.</th>
                      <th>Total Amount</th>
                      <th>Status</th>
                      <th>Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($orders as $order)   
                      <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $order->order_number ?? 'N/A' }}</td>
                          <td>${{ number_format($order->total_price, 2) }}</td>
                          <td>
                              @if($order->status=='new')
                                <span class="badge badge-primary">{{ $order->status }}</span>
                              @elseif($order->status=='process')
                                <span class="badge badge-warning">{{ $order->status }}</span>
                              @elseif($order->status=='delivered')
                                <span class="badge badge-success">{{ $order->status }}</span>
                              @else
                                <span class="badge badge-danger">{{ $order->status }}</span>
                              @endif
                          </td>
                          <td>{{ $order->created_at->format('M d, Y') }}</td>
                          <td>
                              <a href="{{ route('user.order.show', $order->id) }}" class="btn btn-warning btn-sm" data-toggle="tooltip" title="View">
                                <i class="fas fa-eye"></i>
                              </a>
                          </td>
                      </tr>  
                    @endforeach
                  </tbody>
                </table>
              </div>
              <div class="d-flex justify-content-center">
                {{ $orders->links() }}
              </div>
            @else
              <div class="text-center">
                <h4 class="my-4">You have no orders yet!</h4>
                <p>Start your learning journey by exploring our courses.</p>
                <a href="{{ route('course.page') }}" class="btn btn-primary">Browse Courses</a>
              </div>
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