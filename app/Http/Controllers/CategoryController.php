<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $categories = Category::where('name', 'like', "%$search%")
                        ->paginate(5);

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status
        ]);

        return redirect()->route('categories.index');
    }
    public function edit($id)
{
    $category = Category::findOrFail($id);

    return view('categories.edit', compact('category'));
}

    public function update(Request $request, $id)
    {
    $category = Category::findOrFail($id);

    $category->update([
        'name' => $request->name,
        'description' => $request->description,
        'status' => $request->status
    ]);

    return redirect()->route('categories.index');
    }
}