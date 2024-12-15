<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class CustomerProductDetailsController extends Controller
{
    public function show($id)
    {
        // Fetch the product by its ID
        $product = Product::findOrFail($id);

        // Return a view with the product details
        return view('customer.products.details', compact('product'));
    }
}
