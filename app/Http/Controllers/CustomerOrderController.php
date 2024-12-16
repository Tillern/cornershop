<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerOrderController extends Controller
{
    public function create(Request $request)
    {
        // Collect customer data
        $customer = Customer::create($request->only('name', 'email', 'phone', 'address'));

        // Create order
        $cartItems = $request->input('cart'); // Assumed cart is passed as array
        $totalPrice = 0;

        foreach ($cartItems as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }

        $order = Order::create([
            'customer_id' => $customer->id,
            'total_price' => $totalPrice,
        ]);

        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        return response()->json(['message' => 'Order placed successfully!', 'order_id' => $order->id]);
    }

    public function view($customerId)
    {
        $customer = Customer::with('orders.items')->find($customerId);

        if (!$customer) {
            return response()->json(['error' => 'Customer not found!'], 404);
        }

        return response()->json($customer);
    }
}
