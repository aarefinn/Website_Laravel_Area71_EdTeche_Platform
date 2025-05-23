<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Cart;

class CourseController extends Controller
{
    // Show the "/course" page with all available courses
    public function coursePage()
    {
        $courses = Course::all(); // ✅ Fetching all courses
        return view('frontend.pages.course', compact('courses')); // ✅ Passing data
    }
    // Add course to cart
    public function addToCart($id)
    {
        $course = Course::findOrFail($id);

        // Check if cart exists for the user
        $cart = session()->get('cart', []);

        // Add course to cart session
        $cart[$id] = [
            'title' => $course->title,
            'price' => $course->price,
            'image' => $course->image
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Course added to cart!');
    }

    // Buy Course - Proceed to Checkout
    public function buyCourse($id)
    {
        $course = Course::findOrFail($id);

        // Here, you can implement payment gateway integration (e.g., SSLCOMMERZ)

        return redirect()->back()->with('success', 'Course purchased successfully!');
    }
}
