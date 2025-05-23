<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Payment;
use App\Models\Shipping;
use App\Models\User;
use App\Models\Wishlist;
use Auth;
use Session;
use Newsletter;
use DB;
use Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(Request $request){
        return redirect()->route($request->user()->role);
    }

    public function home(){
        // Fetch necessary data if required later
        return view('frontend.index');
    }

    public function aboutUs(){
        return view('frontend.pages.about-us');
    }

    public function contact(){
        return view('frontend.pages.contact');
    }

    // User Authentication
    public function login(){
        return view('frontend.pages.login');
    }

    public function loginSubmit(Request $request){
        $data = $request->all();
        if(Auth::attempt(['email' => $data['email'], 'password' => $data['password'], 'status' => 'active'])){
            Session::put('user', $data['email']);
            request()->session()->flash('success', 'Successfully logged in');
            return redirect()->route('home');
        } else {
            request()->session()->flash('error', 'Invalid email or password, please try again!');
            return redirect()->back();
        }
    }

    public function logout(){
        Session::forget('user');
        Auth::logout();
        request()->session()->flash('success', 'Logout successful');
        return back();
    }

    public function register(){
        return view('frontend.pages.register');
    }

    public function registerSubmit(Request $request){
        $this->validate($request, [
            'name' => 'string|required|min:2',
            'email' => 'string|required|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $data = $request->all();
        $check = $this->create($data);
        Session::put('user', $data['email']);

        if($check){
            request()->session()->flash('success', 'Successfully registered');
            return redirect()->route('home');
        } else {
            request()->session()->flash('error', 'Please try again!');
            return back();
        }
    }

    public function create(array $data){
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'status' => 'active'
        ]);
    }

    // Reset Password
    public function showResetForm(){
        return view('auth.passwords.old-reset');
    }

    // Newsletter Subscription
    public function subscribe(Request $request){
        if(!Newsletter::isSubscribed($request->email)){
            Newsletter::subscribePending($request->email);
            if(Newsletter::lastActionSucceeded()){
                request()->session()->flash('success', 'Subscribed! Please check your email');
                return redirect()->route('home');
            } else {
                Newsletter::getLastError();
                return back()->with('error', 'Something went wrong! Please try again');
            }
        } else {
            request()->session()->flash('error', 'Already Subscribed');
            return back();
        }
    }
}
