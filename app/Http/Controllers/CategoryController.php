<?php

namespace App\Http\Controllers;

use App\Models\Category;
// use App\Models\Product;
use Illuminate\Http\Request;





class CategoryController extends Controller
{
    public function index()
    {
        $Categories = Category::all();
        return view('Categories.index', compact('Categories'));
    }

    public function create()
    {

        return view('Categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Category::create($request->all());
        return redirect()->route('categories.index');
    }

    public function edit(Category $Category)
    {
        return view('Categories.edit', compact('Category'));
    }

    public function update(Request $request, Category $Category)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $Category->update($request->all());
        return redirect()->route('categories.index');
    }

    public function destroy(Category $Category)
    {

        if ($Category->products()->exists()) {
            // Redirect back with an error message
            return redirect()->route('categories.index')->with('category-error', "Category '{$Category->name}' cannot be deleted because it has associated products.");
        }



        $Category->delete();
        return redirect()->route('categories.index');
    }
}
