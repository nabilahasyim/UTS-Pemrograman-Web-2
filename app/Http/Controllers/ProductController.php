<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
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

    public function create()
    {
        $categories = Category::all();

        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $product = new Product();

        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->status = $request->status;

        $product->save();

        return redirect()->route('products.index');
    }
    public function edit($id)
    {
    $product = Product::findOrFail($id);

    $categories = Category::all();

    return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
    $product = Product::findOrFail($id);

    $product->category_id = $request->category_id;
    $product->name = $request->name;
    $product->status = $request->status;

    $product->save();

    return redirect()->route('products.index');
    }
}