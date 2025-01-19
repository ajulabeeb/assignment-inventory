<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
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

    public function store(StoreCategoryRequest $request)
    {
        Category::create($request->validated());
        return redirect()->route('categories.index');
    }

    public function edit(Category $Category)
    {
        return view('Categories.edit', compact('Category'));
    }

    public function update(UpdateCategoryRequest $request, Category $Category)
    {
        $Category->update($request->validated());
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
