<?php

namespace App\Services;

use Illuminate\Support\Facades\Redis;

class CartService
{
    protected $cartKey;

    public function __construct($userId)
    {
        $this->cartKey = "cart:{$userId}";
    }

    /**
     * Get all items in the user's cart.
     */
    public function getCartItems()
    {
        $items = Redis::hgetall($this->cartKey);
        return array_map('json_decode', $items);
    }

    /**
     * Add an item to the cart.
     */
    public function addToCart($productId, $quantity)
    {
        $existingItem = Redis::hget($this->cartKey, $productId);
        $item = $existingItem ? json_decode($existingItem, true) : ['quantity' => 0];

        $item['quantity'] += $quantity;

        Redis::hset($this->cartKey, $productId, json_encode($item));
        return $item;
    }

    /**
     * Remove an item from the cart.
     */
    public function removeFromCart($productId)
    {
        Redis::hdel($this->cartKey, $productId);
    }

    /**
     * Clear the cart after order placement.
     */
    public function clearCart()
    {
        Redis::del($this->cartKey);
    }
}