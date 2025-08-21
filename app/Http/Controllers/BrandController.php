<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::orderBy('id', 'DESC')->paginate(10);
        return view('backend.brand.index')->with('brands', $brands);
    }

    public function create()
    {
        return view('backend.brand.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();
        $status = Brand::create($data);
        
        if ($status) {
            request()->session()->flash('success', 'Brand successfully created');
        } else {
            request()->session()->flash('error', 'Error occurred while creating brand');
        }
        
        return redirect()->route('brand.index');
    }
} 