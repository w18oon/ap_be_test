<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
// use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'qty' => 'required|integer',
            'price' => 'required|integer',
        ]);
 
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $product = Product::create($request->only(['name', 'description', 'qty', 'price']));

        return response()->json([
            'message' => 'create product success',
            'product' => $product,
        ]);
    }

    public function show(Product $product)
    {
        return response()->json($product);
    }

    public function update(Request $request, Product $product)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'qty' => 'required|integer',
            'price' => 'required|integer',
        ]);
 
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $product->update($request->all());

        return response()->json([
            'message' => 'update product success',
            'product' => $product,
        ]);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json([
            'message' => 'delete product success',
        ]);
    }
}
