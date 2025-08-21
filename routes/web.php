<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProductReviewController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\HomeController;
use \UniSharp\LaravelFilemanager\Lfm;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

//  **Cache Clear Route**
Route::get('cache-clear', function () {
    Artisan::call('optimize:clear');
    request()->session()->flash('success', 'Successfully cache cleared.');
    return redirect()->back();
})->name('cache.clear');

//  **Storage Link Route**
Route::get('storage-link', [AdminController::class, 'storageLink'])->name('storage.link');

//  **Auth Routes**
Auth::routes(['register' => false]);
Route::get('user/login', [FrontendController::class, 'login'])->name('login.form');
Route::post('user/login', [FrontendController::class, 'loginSubmit'])->name('login.submit');
Route::get('user/logout', [FrontendController::class, 'logout'])->name('user.logout');
Route::get('user/register', [FrontendController::class, 'register'])->name('register.form');
Route::post('user/register', [FrontendController::class, 'registerSubmit'])->name('register.submit');

//  **Courses**
Route::get('/course', [CourseController::class, 'coursePage'])->name('course.page');
Route::post('/course/{id}/add-to-cart', [CourseController::class, 'addToCart'])->name('course.addToCart');
Route::post('/course/{id}/buy', [CourseController::class, 'buyCourse'])->name('course.buy');


//  **Password Reset**
Route::post('password-reset', [FrontendController::class, 'showResetForm'])->name('custom.password.reset');


//  **Social Login**
Route::get('login/{provider}/', [LoginController::class, 'redirect'])->name('login.redirect');
Route::get('login/{provider}/callback/', [LoginController::class, 'Callback'])->name('login.callback');

//  **Frontend Pages**
Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/home', [FrontendController::class, 'home'])->name('home.page');
Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard')->middleware('user');
Route::get('/test-dashboard', function() {
    return view('dashboard-test', [
        'user' => \App\Models\User::first(),
        'orders' => collect([]),
        'totalOrders' => 0,
        'totalSpent' => 0,
        'enrolledCourses' => collect([])
    ]);
})->name('test.dashboard');
Route::get('/test-notification', function() {
    request()->session()->flash('error', 'This is a test error message!');
    return redirect()->route('login.form');
})->name('test.notification');
Route::get('/about-us', [FrontendController::class, 'aboutUs'])->name('about-us');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::post('/contact/message', [MessageController::class, 'store'])->name('contact.store');



//  **Cart Section**

Route::get('/cart', [CartController::class, 'cartView'])->name('cart.view'); // Show Cart Page
Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add'); // Add to Cart
Route::post('/cart/remove/{id}', [CartController::class, 'cartRemove'])->name('cart.remove'); // Remove Item
Route::post('/cart/update/{id}', [CartController::class, 'cartUpdate'])->name('cart.update'); // Update Quantity
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout'); // Checkout Page



Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout')->middleware('user');

// **Wishlist**
Route::get('/wishlist', function () {
    return view('frontend.pages.wishlist');
})->name('wishlist');
Route::get('/wishlist/{slug}', [WishlistController::class, 'wishlist'])->name('add-to-wishlist')->middleware('user');
Route::get('wishlist-delete/{id}', [WishlistController::class, 'wishlistDelete'])->name('wishlist-delete');

//  **Orders**
Route::post('cart/order', [OrderController::class, 'store'])->name('cart.order');
Route::get('order/pdf/{id}', [OrderController::class, 'pdf'])->name('order.pdf');
Route::get('/income', [OrderController::class, 'incomeChart'])->name('product.order.income');

//  **Order Tracking**
Route::get('/product/track', [OrderController::class, 'orderTrack'])->name('order.track');
Route::post('product/track/order', [OrderController::class, 'productTrackOrder'])->name('product.track.order');

//  **Blog Routes**
Route::get('/blog', [FrontendController::class, 'blog'])->name('blog');
Route::get('/blog-detail/{slug}', [FrontendController::class, 'blogDetail'])->name('blog.detail');
Route::get('/blog/search', [FrontendController::class, 'blogSearch'])->name('blog.search');
Route::post('/blog/filter', [FrontendController::class, 'blogFilter'])->name('blog.filter');

//  **Newsletter Subscription**
Route::post('/subscribe', [FrontendController::class, 'subscribe'])->name('subscribe');

//  **Product Reviews**
Route::resource('/review', ProductReviewController::class);
Route::post('product/{slug}/review', [ProductReviewController::class, 'store'])->name('review.store');

//  **Post Comments**
Route::post('post/{slug}/comment', [PostCommentController::class, 'store'])->name('post-comment.store');
Route::resource('/comment', PostCommentController::class);

//  **Coupon**
Route::post('/coupon-store', [CouponController::class, 'couponStore'])->name('coupon-store');

//  **Payment**
Route::get('payment', [PayPalController::class, 'payment'])->name('payment');
Route::get('cancel', [PayPalController::class, 'cancel'])->name('payment.cancel');
Route::get('payment/success', [PayPalController::class, 'success'])->name('payment.success');

//  **Admin Routes**
Route::group(['prefix' => '/admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    Route::resource('users', 'UsersController');
    Route::resource('banner', 'BannerController');
    Route::resource('brand', 'BrandController');
    Route::get('/profile', [AdminController::class, 'profile'])->name('admin-profile');
    Route::post('/profile/{id}', [AdminController::class, 'profileUpdate'])->name('profile-update');
    Route::resource('/category', 'CategoryController');
    Route::resource('/product', 'ProductController');
    Route::resource('/post-category', 'PostCategoryController');
    Route::resource('/post-tag', 'PostTagController');
    Route::resource('/post', 'PostController');
    Route::resource('/message', 'MessageController');
    Route::resource('/order', 'OrderController');
    Route::resource('/shipping', 'ShippingController');
    Route::resource('/coupon', 'CouponController');
    Route::get('settings', [AdminController::class, 'settings'])->name('settings');
    Route::post('setting/update', [AdminController::class, 'settingsUpdate'])->name('settings.update');
});

//  **User Routes**
Route::group(['prefix' => '/user', 'middleware' => ['user']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('user');
    Route::get('/profile', [HomeController::class, 'profile'])->name('user-profile');
    Route::post('/profile/{id}', [HomeController::class, 'profileUpdate'])->name('user-profile-update');
});

//  **File Manager**
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    Lfm::routes();
});
