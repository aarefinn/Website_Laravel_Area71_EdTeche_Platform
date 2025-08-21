<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostTagController extends Controller
{
    public function index()
    {
        return view('backend.post-tag.index');
    }
} 