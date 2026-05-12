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
}