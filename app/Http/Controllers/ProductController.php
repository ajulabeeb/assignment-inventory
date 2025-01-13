<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function index()
    {
        $Products = Product::all();
        return view('Products.index', compact('Products'));
    }

    public function create()
    {
        return view('Products.create');
    }
}
