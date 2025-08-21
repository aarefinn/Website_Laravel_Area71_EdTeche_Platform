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
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        
        // Check if user exists
        $user = User::where('email', $data['email'])->first();
        
        if (!$user) {
            request()->session()->flash('error', 'Email not found. Please register first.');
            return redirect()->back()->withInput($request->except('password'));
        }
        
        // Check if user is active
        if (!$user->isActive()) {
            request()->session()->flash('error', 'Your account is inactive. Please contact administrator.');
            return redirect()->back()->withInput($request->except('password'));
        }

        // Verify password manually first
        if (!Hash::check($data['password'], $user->password)) {
            request()->session()->flash('error', 'Invalid password. Please try again!');
            return redirect()->back()->withInput($request->except('password'));
        }

        // If password is correct, attempt login
        if(Auth::attempt(['email' => $data['email'], 'password' => $data['password'], 'status' => 'active'])){
            Session::put('user', $data['email']);
            request()->session()->flash('success', 'Successfully logged in! Welcome back, ' . Auth::user()->name);
            
            // Redirect to dashboard
            return redirect()->route('user');

        } else {
            request()->session()->flash('error', 'Login failed. Please try again!');
            return redirect()->back()->withInput($request->except('password'));
        }
    }

    public function logout(){
        Session::forget('user');
        Auth::logout();
        request()->session()->flash('success', 'Logout successful');
        return redirect()->route('home');
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
        
        if($check){
            // Auto login after registration
            if(Auth::attempt(['email' => $data['email'], 'password' => $data['password']])){
                Session::put('user', $data['email']);
                request()->session()->flash('success', 'Registration successful! Welcome to Area71 Academy.');
                return redirect()->route('user');

            } else {
                // User created but auto-login failed - redirect to login page
                request()->session()->flash('success', 'Registration successful! Please login with your credentials.');
                return redirect()->route('login.form');
            }
        } else {
            request()->session()->flash('error', 'Registration failed. Please try again!');
            return back();
        }
    }

    public function create(array $data){
        try {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'role' => 'user',
                'status' => 'active'
            ]);
            
            return $user;
        } catch (\Exception $e) {
            \Log::error('User creation failed: ' . $e->getMessage());
            return false;
        }
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
