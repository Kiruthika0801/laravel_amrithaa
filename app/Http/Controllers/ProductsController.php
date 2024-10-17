<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Products::all();
        return view('products.list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function add()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'product_description' => 'required',
            'price' => 'required|numeric',
            'qty' => 'required|integer',
        ]);

        Products::create([
            'product_name' => $request->product_name,
            'product_description' => $request->product_description,
            'price' => $request->price,
            'qty' => $request->qty,
        ]);
        return redirect()->route('products/list/page')->with('success', 'Product added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(Products $product, $id)
    // {
    //     print_r($id);exit;
    //     return view('products.edit', compact('product'));
    // }
    public function edit($id)
{
    $product = Products::findOrFail($id); // Fetch the product based on the ID
    return response()->json($product); // Return product data as JSON
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'product_description' => 'nullable|string',
            'price' => 'required|numeric',
            'qty' => 'required|integer',
        ]);

        $product = Products::findOrFail($id);
        $product->product_name = $request->input('product_name');
        $product->product_description = $request->input('product_description');
        $product->price = $request->input('price');
        $product->qty = $request->input('qty');
        $product->save();
        // print_r($product);exit;

        return redirect()->route('products.list')->with('success', 'Product updated successfully!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $products->delete();
        return redirect()->route('products.list');
    }
}
