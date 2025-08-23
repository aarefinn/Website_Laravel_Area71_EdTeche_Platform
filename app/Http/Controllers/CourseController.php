<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    /**
     * Display the courses page
     */
    public function coursePage()
    {
        $courses = Course::where('status', 'active')->get();
        return view('frontend.pages.course', compact('courses'));
    }

    /**
     * Add course to cart
     */
    public function addToCart($id)
    {
        if (!Auth::check()) {
            return redirect()->route('login.form')->with('error', 'Please login to add courses to cart.');
        }

        $course = Course::findOrFail($id);
        $user = Auth::user();

        // Check if course already exists in cart
        $existingCartItem = Cart::where('user_id', $user->id)
            ->where('course_id', $id)
            ->first();

        if ($existingCartItem) {
            return redirect()->back()->with('error', 'Course already in cart!');
        }

        // Add course to cart
        Cart::create([
            'user_id' => $user->id,
            'course_id' => $id,
            'quantity' => 1,
            'price' => $course->price
        ]);

        return redirect()->back()->with('success', 'Course added to cart successfully!');
    }

    /**
     * Buy course directly
     */
    public function buyCourse($id)
    {
        if (!Auth::check()) {
            return redirect()->route('login.form')->with('error', 'Please login to buy a course.');
        }

        $user = Auth::user();
        $course = Course::findOrFail($id);

        // Check if already purchased
        $existing = DB::table('order_details')
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->where('orders.user_id', $user->id)
            ->where('order_details.course_id', $course->id)
            ->exists();

        if ($existing) {
            return redirect()->route('user')->with('success', 'You already own this course.');
        }

        // Create order
        $orderId = DB::table('orders')->insertGetId([
            'user_id' => $user->id,
            'status' => 'delivered',
            'total_amount' => $course->price,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('order_details')->insert([
            'order_id' => $orderId,
            'course_id' => $course->id,
            'price' => $course->price,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('user')->with('success', 'Course purchased successfully!');
    }
}
