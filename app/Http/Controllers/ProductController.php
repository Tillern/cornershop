<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $products = Product::all();
    return view('products.index', compact('products'));
}


    /**
     * Show the form for creating a new resource.
     */
   
     public function create()
     {
         return view('admin.products.create');
     }
     
     public function store(Request $request)
     {
         $validated = $request->validate([
             'name' => 'required|string|max:255',
             'description' => 'required|string',
             'price' => 'required|numeric|min:0',
             'stock' => 'required|integer|min:0',
         ]);
     
         Product::create($validated);
     
         return redirect()->route('products.create')->with('success', 'Product added successfully!');
     }
       

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
