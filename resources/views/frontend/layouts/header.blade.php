<header class="header">
    <!-- Topbar -->
<div class="topbar">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-12">
                <!-- Top Left -->
                <div class="top-left">
                    <ul class="list-main" style="display: flex; gap: 15px;">
                        <li style="color: #F6D273;">
                            <i class="ti-headphone-alt" style="color: #F6D273;"></i> 
                            {{ config('settings.phone') }}
                        </li>
                        <li style="color: #F6D273;">
                            <i class="ti-email" style="color: #F6D273;"></i> 
                            <a href="mailto:info@area71bd.com" style="color: #F6D273; text-decoration: none;">
                                info@area71bd.com
                            </a>
                        </li>
                    </ul>
                </div>
                <!--/ End Top Left -->
            </div>
            <div class="col-lg-6 col-md-12 col-12">
                <!-- Top Right -->
                <div class="right-content">
                    <ul class="list-main" style="display: flex; justify-content: flex-end; gap: 15px;">
                        
                        @auth
                            <li>
                                <i class="ti-user" style="color: #F6D273;"></i> 
                                <a href="{{ Auth::user()->role == 'admin' ? route('admin') : route('user') }}" target="_blank" style="color: #F6D273; text-decoration: none;">
                                    Dashboard
                                </a>
                            </li>
                            <li>
                                <i class="ti-power-off" style="color: #F6D273;"></i> 
                                <a href="{{ route('user.logout') }}" style="color: #F6D273; text-decoration: none;">Logout</a>
                            </li>
                        @else
                            <li>
                                <i class="ti-power-off" style="color: #F6D273;"></i> 
                                <a href="{{ route('login.form') }}" style="color: #F6D273; text-decoration: none;">
                                    Login / Register
                                </a>
                            </li>
                        @endauth
                    </ul>
                </div>
                <!-- End Top Right -->
            </div>
        </div>
    </div>
</div>
<!-- End Topbar -->


    <div class="middle-inner" >
    <div class="container">
        <div class="row" style="display: flex; align-items: center;">
            <div class="col-lg-2 col-md-2 col-12">
                <!-- Logo -->
                <div class="logo text-center" style="display: flex; justify-content: center; align-items: center;">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('storage/photos/1/logo.png') }}" alt="logo" class="logo-img" 
                             style="max-width: 120px; display: block;">
                    </a>
                </div>
                <!--/ End Logo -->
                <div class="mobile-nav"></div>
            </div>
            <div class="col-lg-2 col-md-3 col-12">
                <div class="right-bar" style="display: flex; align-items: center; justify-content: flex-end; gap: 15px;">


                    <!-- Shopping Cart -->
                    <div class="sinlge-bar shopping">
                    <a href="{{ route('cart.view') }}" class="single-icon">
                        <i class="ti-bag"></i> 
                        <span class="total-count">{{ session('cart') ? count(session('cart')) : 0 }}</span>
                    </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Header Inner -->
    <div class="header-inner">
        <div class="container">
            <div class="cat-nav-head">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="menu-area">
                            <nav class="navbar navbar-expand-lg">
                                <div class="navbar-collapse">	
                                    <div class="nav-inner">	
                                        <ul class="nav main-menu menu navbar-nav">
                                            <li class="{{ Request::is('home') ? 'active' : '' }}">
                                                <a href="{{ route('home') }}">Home</a>
                                            </li>
                                            <li class="{{ Request::is('about-us') ? 'active' : '' }}">
                                                <a href="{{ route('about-us') }}">About Us</a>
                                            </li>
                                            <li class="{{ Request::is('course') ? 'active' : '' }}">
                                                <a href="{{ route('course.page') }}">Courses</a>
                                            </li>
                                            <li class="{{ Request::is('contact') ? 'active' : '' }}">
                                                <a href="{{ route('contact') }}">Contact Us</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Header Inner -->
</header>
