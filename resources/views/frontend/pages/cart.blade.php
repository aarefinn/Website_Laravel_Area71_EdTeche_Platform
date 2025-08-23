@extends('frontend.layouts.master')

@section('title','Cart Page')

@section('main-content')

<!-- Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="{{ route('home') }}">Home<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="#">Cart</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- Cart Section -->
<section class="cart-section section">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <h2 style="color: #142220; font-size: 32px; font-weight: 800;">Your Shopping Cart</h2>
                <p style="color: #777; font-size: 16px;">Review your selected courses before checkout.</p>
            </div>
        </div>

        @if($cartItems->count() > 0)
            <div class="row justify-content-center mt-4">
                @foreach($cartItems as $item)
                    <div class="col-lg-6 col-md-8 col-sm-12 mb-4 d-flex">
                        <div class="cart-item d-flex flex-column justify-content-between" 
                            style="background: #142220; border-radius: 12px; padding: 20px; text-align: center; width: 100%; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
                            
                            <!-- Course Image -->
                            <img src="{{ asset('storage/' . $item->course->photo) }}" alt="{{ $item->course->title }}" 
                                style="width: 100%; max-width: 250px; margin: auto; border-radius: 10px;">

                            <!-- Course Details -->
                            <h3 style="color: #F6D273; font-size: 20px; font-weight: bold; margin-top: 15px;">{{ $item->course->title }}</h3>
                            <p style="color: #fff; font-size: 18px; font-weight: bold;">Price: <span style="color: #F6D273;">${{ $item->price }}</span></p>
                            <p style="color: #ccc; font-size: 14px;">
                                Quantity: <strong>{{ $item->quantity }}</strong>
                            </p>

                            <!-- Remove & Update Buttons -->
                            <div class="d-flex justify-content-center mt-3">
                                <form action="{{ route('cart.remove', $item->id) }}" method="POST" style="margin-right: 10px;">
                                    @csrf
                                    <button type="submit" style="background: red; color: #fff; font-size: 14px; padding: 10px 15px; border: none; border-radius: 6px; cursor: pointer;">
                                        Remove
                                    </button>
                                </form>

                                <form action="{{ route('cart.update', $item->id) }}" method="POST">
                                    @csrf
                                    <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" max="10" 
                                           style="width: 50px; text-align: center; border-radius: 5px; border: 1px solid #F6D273; padding: 5px;">
                                    <button type="submit" style="background: #F6D273; color: #142220; font-size: 14px; font-weight: bold; padding: 10px 15px; border: none; border-radius: 6px; cursor: pointer;">
                                        Update
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>
@endsection
