<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function placeOrder(Request $request)
{
    $cart = json_decode(Redis::get('cart'), true);
    $totalPrice = array_reduce($cart, fn($sum, $item) => $sum + $item['price'], 0);

    $order = Order::create([
        'customer_name' => $request->customer_name,
        'customer_email' => $request->customer_email,
        'address' => $request->address,
        'products' => json_encode($cart),
        'total_price' => $totalPrice,
    ]);

    Redis::del('cart');
    return response()->json(['message' => 'Order placed successfully'], 200);
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
