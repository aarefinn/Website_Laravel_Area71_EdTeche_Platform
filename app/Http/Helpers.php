<?php

namespace App\Http;

use App\Models\Order;
use App\Models\Wishlist;
use App\Models\Shipping;
use App\Models\Cart;
use App\Models\Category; // ✅ Added missing Category model
use Illuminate\Support\Facades\Auth;

class Helper {
    

    public static function cartCount($user_id = '') {
        if (Auth::check()) {
            if ($user_id == "") $user_id = auth()->user()->id;
            return Cart::where('user_id', $user_id)->whereNull('order_id')->sum('quantity');
        } else {
            return 0;
        }
    }

    public static function getAllProductFromCart($user_id = '') {
        if (Auth::check()) {
            if ($user_id == "") $user_id = auth()->user()->id;
            return Cart::where('user_id', $user_id)->whereNull('order_id')->get();
        } else {
            return 0;
        }
    }

    public static function totalCartPrice($user_id = '') {
        if (Auth::check()) {
            if ($user_id == "") $user_id = auth()->user()->id;
            return Cart::where('user_id', $user_id)->whereNull('order_id')->sum('price'); // ✅ Fixed field
        } else {
            return 0;
        }
    }

    // ✅ Wishlist Count
    public static function wishlistCount($user_id = '') {
        if (Auth::check()) {
            if ($user_id == "") $user_id = auth()->user()->id;
            return Wishlist::where('user_id', $user_id)->count();
        } else {
            return 0;
        }
    }

    public static function getAllProductFromWishlist($user_id = '') {
        if (Auth::check()) {
            if ($user_id == "") $user_id = auth()->user()->id;
            return Wishlist::where('user_id', $user_id)->get();
        } else {
            return 0;
        }
    }

    public static function totalWishlistPrice($user_id = '') {
        if (Auth::check()) {
            if ($user_id == "") $user_id = auth()->user()->id;
            return Wishlist::where('user_id', $user_id)->sum('price'); 
        } else {
            return 0;
        }
    }



    // ✅ Admin Earnings
    public static function earningPerMonth() {
        return Order::where('status', 'delivered')->sum('total_price'); 
    }

    public static function shipping() {
        return Shipping::orderBy('id', 'DESC')->get();
    }
}
