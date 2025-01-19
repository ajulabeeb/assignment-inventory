<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     */
    public function index()
    {
        $Products = Product::all();
        return view('Products.index', compact('Products'));
    }

    /**
     * Show the form for creating a new product.
     */
    public function create()
    {
        $Categories = $this->getCategories();
        return view('Products.create', compact('Categories'));
    }

    /**
     * Store a newly created product in storage.
     */
    public function store(StoreProductRequest $request)
    {
        Product::create($request->validated());
        return redirect()->route('Products.index')->with('success', 'Product added successfully!');
    }

    /**
     * Show the form for editing the specified product.
     */
    public function edit(Product $Product)
    {
        $Categories = $this->getCategories();
        return view('Products.edit', compact('Product', 'Categories'));
    }

    /**
     * Update the specified product in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->validated());
        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified product from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('Products.index')->with('success', 'Product deleted successfully!');
    }

    /**
     * Fetch all categories.
     */
    private function getCategories()
    {
        return Category::all();
    }
}
