<?php

namespace App\Http\Controllers;

use App\Services\OrderService;
use App\Services\CartService;
use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
   
    public function __construct(OrderService $orderService, CartService $cartService)
    {
        $this->orderService = $orderService;
        $this->cartService = $cartService;
    }

    
    public function index()
    {
        
    }
    
    public function placeOrder()
    {
        $cartItems = $this->cartService->getCartItems();
    
        if (empty($cartItems)) {
            return response()->json(['error' => 'Cart is empty'], 400);
        }
    
        $order = $this->orderService->placeOrder(auth()->id(), $cartItems);
        $this->cartService->clearCart();
    
        return response()->json(['message' => 'Order placed successfully', 'order' => $order]);
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
