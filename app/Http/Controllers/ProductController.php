<?php

namespace App\Http\Controllers;

use App\Models\Categories;
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
        $Categories = Categories::all();
        return view('Products.create', compact('Categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'string|nullable',
            'price' => 'required|numeric',
            'category_id' => 'required|string'
        ]);

        Product::create($request->all());
        return redirect()->route('products.index');
    }

}
