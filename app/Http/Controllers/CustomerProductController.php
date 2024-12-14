<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class CustomerProductController extends Controller
{
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

        return view('customers.products.index', compact('products', 'categories', 'categoryId', 'sortOrder'));
    }
}
