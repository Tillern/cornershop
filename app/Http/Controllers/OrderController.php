<?php

namespace App\Http\Controllers;

use App\Services\OrderService;
use App\Services\CartService;
use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create()
    {
        // Fetch cart items and total price from the session
        $cartItems = session()->get('cart', []);
        $totalPrice = array_reduce($cartItems, fn($carry, $item) => $carry + ($item['price'] * $item['quantity']), 0);

        return view('order.create', compact('cartItems', 'totalPrice'));
    }

    public function store(Request $request)
    {
        // Validate and process the order
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'address' => 'required|string',
        ]);

        // Create an order (example logic, replace with actual database logic)
        $order = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'cart_items' => json_encode(session()->get('cart', [])),
            'total_price' => session()->get('cart_total', 0),
        ];

        // Here you would save the order to the database
        // For example:
        // Order::create($order);

        // Clear the cart after placing the order
        session()->forget('cart');

        return redirect()->route('cart.index')->with('success', 'Your order has been placed successfully!');
    }
}