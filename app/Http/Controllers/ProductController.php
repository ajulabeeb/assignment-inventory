<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Category;
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
        $Categories = Category::all();
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

    public function edit(Product $Product)
    {
        $Categories = Category::all();
        return view('Products.edit', compact('Product','Categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'string|nullable',
            'price' => 'required|numeric',
            'category_id' => 'required|string'
        ]);

        $product->update($request->all());
        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
