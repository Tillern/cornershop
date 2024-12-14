<?php

namespace App\Services;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;

class OrderService
{
    
    public function placeOrder($userId, $cartItems)
    {
        DB::beginTransaction();

        try {
            // Create the order
            $order = Order::create([
                'user_id' => $userId,
                'status' => 'pending',
            ]);

            // Add items to the order
            foreach ($cartItems as $productId => $item) {
                $order->orderItems()->create([
                    'product_id' => $productId,
                    'quantity' => $item['quantity'],
                ]);
            }

            DB::commit();

            return $order;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }


    public function getUserOrders($userId)
    {
        return Order::where('user_id', $userId)->with('orderItems.product')->get();
    }
}