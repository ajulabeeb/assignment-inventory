<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $Categories = Categories::all();
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
            'description' => 'nullable|string'
        ]);

        Categories::create($request->all());
        return redirect()->route('categories.index');
    }
}
