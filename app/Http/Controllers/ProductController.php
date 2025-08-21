<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'DESC')->paginate(10);
        return view('backend.product.index')->with('products', $products);
    }
} 