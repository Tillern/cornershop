<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class CustomerProductController extends Controller
{

    
public function shop(Request $request)
{
    $categoryId = $request->query('category', ''); // Get the category id from the query string

    // Fetch categories with the count of products
    $categories = Category::withCount('products')->get();

    // Fetch products based on category, sorted by latest (created_at)
    if ($categoryId) {
        $products = Product::where('category_id', $categoryId)
                           ->orderBy('created_at', 'desc') // Latest first
                           ->paginate(12); // Paginate products (optional)
    } else {
        $products = Product::orderBy('created_at', 'desc')->paginate(12); // All products
    }

    // Return the view with the categories, selected category, and products
    return view('customer.shop', compact('categories', 'categoryId', 'products'));
}


    public function index(Request $request)
    {
        // Fetch all categories for the dropdown
        $categories = Category::all();

        // Filter and sort logic
        $categoryId = $request->query('category');
        $sortOrder = $request->query('sort', 'desc'); // Default to 'desc'

        $products = Product::query();

        if ($categoryId) {
            $products->where('category_id', $categoryId);
        }

        $products->orderBy('created_at', $sortOrder);

        // Paginate products
        $products = $products->paginate(10);

        return view('customer.products.index', compact('products', 'categories', 'categoryId', 'sortOrder'));
    }
}
