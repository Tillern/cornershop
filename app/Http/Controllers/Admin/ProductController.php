<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

   
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    
    public function store(Request $request)
{
    // Validate the incoming data
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'category_id' => 'required|exists:categories,id',
    ]);
    
    // Create a new product
    $product = new Product();
    $product->name = $validated['name'];
    $product->description = $validated['description'];
    $product->price = $validated['price'];
    $product->stock = $validated['stock'];
    $product->category_id = $validated['category_id'];

    
    if ($request->hasFile('image')) {
        $image = $request->file('image')->store('products', 'public');
        $product->image = $image;
        $product->save();
    }

    // Save the product to the database
    $product->save();

    // Redirect back with success message
    return redirect()->route('admin.products.index')->with('success', 'Product added successfully');
}


   
     public function show($id)
     {
         $product = Product::findOrFail($id);
         return view('admin.products.show', compact('product'));
     }
     

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }


    public function update(Request $request, $id)
{
    $product = Product::find($id);

    if (!$product) {
        return redirect()->route('admin.products.index')->with('error', 'Product not found');
    }

    $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'description' => 'nullable',
        'category_id' => 'required|exists:categories,id',
        'image' => 'nullable|image',
    ]);

    $product->name = $request->name;
    $product->price = $request->price;
    $product->description = $request->description;
    $product->category_id = $request->category_id;
    
    if ($request->hasFile('image')) {
        $image = $request->file('image')->store('products', 'public');
        $product->image = $image;
        $product->save();
    }

    $product->save();

    return redirect()->route('admin.products.index')->with('success', 'Product updated successfully');

    }


    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully');
    }
}
