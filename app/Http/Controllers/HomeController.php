<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(8);
        return view('pages.home', compact('products'));
    }
}
