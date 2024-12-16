<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;


class AdminOrderController extends Controller
{

    public function index()
    {
        $orders = Order::with('items.product')->get(); // Fetch orders with associated items and products
        return view('admin.orders.index', compact('orders'));
    }

    public function store(Request $request)
    {
        // Validate Input
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'products' => 'required|array|min:1',
            'products.*' => 'required|exists:products,id',
        ]);

        // Create Order
        $order = Order::create([
            'customer_name' => $validated['customer_name'],
            'customer_email' => $validated['customer_email'],
            'status' => 'Pending',
        ]);

        // Create Order Items
        foreach ($validated['products'] as $productId) {
            $order->items()->create(['product_id' => $productId]);
        }

        return redirect()->route('admin.orders.index')->with('success', 'Order added successfully!');
    }


    public function create()
    {
        $products = Product::all(); // Fetch all products for the dropdown
        return view('admin.orders.create', compact('products'));
    }

    // 2. Show specific order details
    public function show(Order $order)
    {
        $order->load('items'); // Load related order items
        return view('admin.orders.show', compact('order'));
    }

    // 3. Edit order details
    public function edit($id)
    {
        $order = Order::with('items.product')->findOrFail($id); // Ensure the order and its products are loaded
        $products = Product::all(); // Retrieve all products

        return view('admin.orders.edit', compact('order', 'products'));
    }


    public function update(Request $request, Order $order)
    {
        $validatedData = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'products' => 'sometimes|array|min:1',
            'products.*' => 'exists:products,id',
        ]);

        // Update order details
        $order->update([
            'customer_name' => $validatedData['customer_name'],
            'customer_email' => $validatedData['customer_email'],
        ]);

        // Update order items if provided
        if (isset($validatedData['products'])) {
            // Remove existing items and add new ones
            $order->items()->delete();
            foreach ($validatedData['products'] as $productId) {
                $order->items()->create(['product_id' => $productId]);
            }
        }

        return redirect()->route('admin.orders.index')->with('success', 'Order updated successfully.');
    }


    public function destroy(Order $order)
    {
        $order->items()->delete(); // Delete related items first
        $order->delete(); // Then delete the order

        return redirect()->route('admin.orders.index')->with('success', 'Order deleted successfully.');
    }


    public function updateStatus(Request $request, Order $order)
    {
        $validated = $request->validate([
            'status' => 'required|string|in:Pending,Processing,Completed,Cancelled',
        ]);

        $order->update(['status' => $validated['status']]);

        return redirect()->route('admin.orders.index')->with('success', 'Order status updated successfully.');
    }

}