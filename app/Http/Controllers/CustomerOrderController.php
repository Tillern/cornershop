<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Order;

class CustomerOrderController extends Controller
{
    public function create()
    {
        $cartItems = session()->get('cart', []);

        if (empty($cartItems)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
        }

        return view('customer.orders.create', compact('cartItems'));
    }

    public function store(Request $request)
    {
        // Validate order data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'address' => 'required|string',
            'phone' => 'required|string|regex:/^\+?[0-9]{10,15}$/',
        ]);

        // Check if the cart is empty
        $cartItems = session()->get('cart', []);
        if (empty($cartItems)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
        }

        // Create the order
        $order = Order::create([
            'customer_name' => $validatedData['name'],
            'customer_email' => $validatedData['email'],
            'address' => $validatedData['address'],
            'phone' => $validatedData['phone'],
        ]);

        // Add items to the order
        foreach ($cartItems as $cartItem) {
            if (isset($cartItem['product_id'], $cartItem['quantity'], $cartItem['price'])) {
                $order->items()->create([
                    'product_id' => $cartItem['product_id'],
                    'quantity' => $cartItem['quantity'],
                    'price' => $cartItem['price'],
                ]);
            } else {
                Log::error('Cart item is missing product_id, quantity, or price', [
                    'cart_item' => $cartItem,
                    'order_id' => $order->id,
                ]);
            }
        }

        // Clear the cart
        session()->forget('cart');

        return redirect()->route('customer.orders.show', ['order' => $order->id])
            ->with('success', 'Order placed successfully!');
    }


    public function index()
    {
        $orders = Order::with('items')->get(); // Adjust logic as needed
        return view('customer.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        // Load order items and related data if needed
        $order->load('items'); // Assumes 'items' is a relationship on the Order model

        return view('customer.orders.show', compact('order'));
    }

}
