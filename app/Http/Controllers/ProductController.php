<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
   public function index(Request $request)
{
    $query = Product::with('category');

    if ($request->search) {

        $query->where('name', 'like', '%' . $request->search . '%');

    }

    if ($request->category_id) {

        $query->where('category_id', $request->category_id);
    }

    $products = $query->paginate(5);

    $categories = Category::all();
    return view('products.index', compact('products', 'categories'));
    }

    public function show($id)
    {
    $product = Product::with('category')->findOrFail($id);

    return view('products.show', compact('product'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
{
    try {

        DB::beginTransaction();

        $product = new Product();

        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->brand = $request->brand;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->description = $request->description;
        $product->status = $request->status;

        $product->save();

        DB::commit();

        return redirect()->route('products.index');

    } catch (\Exception $e) {

        DB::rollBack();

        return back()->with('error', $e->getMessage());

    }
}

    public function edit($id)
    {
    $product = Product::findOrFail($id);

    $categories = Category::all();

    return view('products.edit', compact('product', 'categories'));
    }

   public function update(Request $request, $id)
{
    try {

        DB::beginTransaction();

        $product = Product::findOrFail($id);

        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->brand = $request->brand;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->description = $request->description;
        $product->status = $request->status;

        $product->save();

        DB::commit();

        return redirect()->route('products.index');

    } catch (\Exception $e) {

        DB::rollBack();

        return back()->with('error', $e->getMessage());

    }
}

    public function destroy($id)
    {
    $product = Product::findOrFail($id);

    $product->delete();

    return redirect()->route('products.index');
    }

    public function trash()
    {
    $products = Product::onlyTrashed()->paginate(5);

    return view('products.trash', compact('products'));
    }
}