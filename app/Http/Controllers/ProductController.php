<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return Product::with('category')->orderBy('created_at', 'desc')->get();
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'unit' => 'required|string|max:50',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:tbl_categories,category_id',
        ]);

        $product = Product::create($request->all());

        return response()->json($product, 201);
    }

    public function show(Product $product)
    {
        return $product;
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'unit' => 'required|string|max:50',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:tbl_categories,category_id',
        ]);

        $product->update($request->all());

        return response()->json($product, 200);
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json(null, 204);
    }
}
