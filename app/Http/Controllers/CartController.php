<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Cart;

class CartController extends Controller
{
    // ✅ View Cart Page
    public function cartView()
    {
        $cartItems = Cart::where('user_id', auth()->id())->with('course')->get();
        return view('frontend.pages.cart', compact('cartItems'));
    }

    // ✅ Add to Cart (Database-Based)
    public function addToCart($id)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You need to log in first!');
        }

        $course = Course::findOrFail($id);

        // Check if course already exists in cart
        $existingCartItem = Cart::where('user_id', auth()->id())
            ->where('course_id', $id)
            ->first();

        if ($existingCartItem) {
            // Update quantity if course already in cart
            $existingCartItem->quantity += 1;
            $existingCartItem->save();
        } else {
            // Add new course to cart
            Cart::create([
                'user_id' => auth()->id(),
                'course_id' => $id,
                'quantity' => 1,
                'price' => $course->price
            ]);
        }

        return redirect()->route('cart.view')->with('success', 'Course added to cart successfully!');
    }

    // ✅ Remove Item from Cart
    public function cartRemove($id)
    {
        $cartItem = Cart::where('user_id', auth()->id())->where('id', $id)->first();

        if ($cartItem) {
            $cartItem->delete();
        }

        return redirect()->route('cart.view')->with('success', 'Course removed from cart!');
    }

    // ✅ Update Cart Quantity
    public function cartUpdate(Request $request, $id)
    {
        $cartItem = Cart::where('user_id', auth()->id())->where('id', $id)->first();

        if ($cartItem) {
            $cartItem->quantity = $request->quantity;
            $cartItem->save();
        }

        return redirect()->route('cart.view')->with('success', 'Cart updated successfully!');
    }

    // ✅ Checkout Page
    public function checkout()
    {
        $cart = Cart::where('user_id', auth()->id())->get();

        if ($cart->isEmpty()) {
            return redirect()->route('cart.view')->with('error', 'Your cart is empty!');
        }

        return view('frontend.pages.checkout', compact('cart'));
    }
}
