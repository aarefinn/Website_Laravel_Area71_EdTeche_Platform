<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::orderBy('id', 'DESC')->paginate(10);
        return view('backend.banner.index')->with('banners', $banners);
    }

    public function create()
    {
        return view('backend.banner.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();
        $status = Banner::create($data);
        
        if ($status) {
            request()->session()->flash('success', 'Banner successfully created');
        } else {
            request()->session()->flash('error', 'Error occurred while creating banner');
        }
        
        return redirect()->route('banner.index');
    }
} 