<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $products = Product::with('category')
            ->where('name', 'like', "%$search%")
            ->paginate(5);

        return view('products.index', compact('products'));
    }
}