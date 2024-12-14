<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use App\Services\CartService;

class CartController extends Controller
{

    protected $redisCartKey;

    public function __construct()
    {
        $this->cartService = new CartService(auth()->id());
        $this->redisCartKey = 'cart:' . session()->getId();
    }    
    
    public function addToCart(Request $request, $id)
    {
        $quantity = $request->input('quantity', 1);
        $item = $this->cartService->addToCart($id, $quantity);
    
        return response()->json(['message' => 'Item added to cart', 'item' => $item]);
    }
    
    public function getCart()
    {
        $cartItems = $this->cartService->getCartItems();
        return response()->json($cartItems);
    }
    

    // Remove item from cart
    public function remove(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|integer',
        ]);

        $productKey = 'product_' . $validated['product_id'];
        Redis::hdel($this->redisCartKey, $productKey);

        return response()->json(['message' => 'Item removed from cart successfully!'], 200);
    }

    // View cart
    public function view()
    {
        $cart = Redis::hgetall($this->redisCartKey);

        $items = collect($cart)->map(function ($item, $key) {
            $productId = str_replace('product_', '', $key);
            $details = json_decode($item, true);
            return [
                'product_id' => $productId,
                'quantity' => $details['quantity'],
            ];
        });

        return response()->json($items, 200);
    }
}