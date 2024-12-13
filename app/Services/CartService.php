<?php
namespace App\Services;

use Illuminate\Support\Facades\Redis;

class CartService
{
    protected $redis;

    public function __construct()
    {
        $this->redis = Redis::connection();
    }

    public function addToCart($customerId, $productId, $quantity)
    {
        $key = "cart:$customerId";
        $this->redis->hIncrBy($key, $productId, $quantity);
    }

    public function getCartItems($customerId)
    {
        $key = "cart:$customerId";
        return $this->redis->hGetAll($key);
    }

    public function removeCartItem($customerId, $productId)
    {
        $key = "cart:$customerId";
        $this->redis->hDel($key, $productId);
    }

    public function clearCart($customerId)
    {
        $key = "cart:$customerId";
        $this->redis->del($key);
    }
}