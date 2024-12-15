<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    // Show the cart
    public function index()
    {
        $cart = session()->get('cart', []); // Get cart from session
        $total = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']); // Calculate total

        return view('cart.index', compact('cart', 'total'));
    }

    // Add a product to the cart
    public function add(Request $request)
    {
        $product = Product::findOrFail($request->product_id); // Find the product
        $cart = session()->get('cart', []); // Get cart from session

        // Check if product already exists in cart
        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $request->quantity; // Update quantity
        } else {
            $cart[$product->id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $request->quantity,
            ];
        }

        session()->put('cart', $cart); // Save cart back to session

        return redirect()->route('cart.index')->with('success', 'Product added to cart!');
    }

    // Update the quantity of a product in the cart
    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
            return redirect()->route('cart.index')->with('success', 'Cart updated successfully!');
        }

        return redirect()->route('cart.index')->with('error', 'Product not found in cart!');
    }

    // Remove a product from the cart
    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
            return redirect()->route('cart.index')->with('success', 'Product removed from cart!');
        }

        return redirect()->route('cart.index')->with('error', 'Product not found in cart!');
    }
}


// class CartController extends Controller
// {
//     // Add to Cart
//     public function add(Request $request)
//     {
//         $sessionId = session()->getId(); // Use session ID as the cart identifier
//         $cartKey = "cart:$sessionId";

//         // Retrieve existing cart or initialize it
//         $cart = Redis::get($cartKey) ? json_decode(Redis::get($cartKey), true) : [];

//         // Check if the product already exists in the cart
//         $productId = $request->product_id;
//         if (isset($cart[$productId])) {
//             $cart[$productId]['quantity'] += $request->quantity;
//         } else {
//             $cart[$productId] = [
//                 'id' => $request->product_id,
//                 'name' => $request->name,
//                 'price' => $request->price,
//                 'quantity' => $request->quantity,
//                 'image' => $request->image,
//             ];
//         }

//         // Save the updated cart in Redis
//         Redis::set($cartKey, json_encode($cart));

//         return response()->json(['message' => 'Product added to cart!', 'cart' => $cart]);
//     }

//     // View Cart
//     public function view()
//     {
//         $sessionId = session()->getId();
//         $cartKey = "cart:$sessionId";

//         $cart = Redis::get($cartKey) ? json_decode(Redis::get($cartKey), true) : [];

//         return view('cart.view', compact('cart'));
//     }

//     // Update Cart Item Quantity
//     public function update(Request $request)
//     {
//         $sessionId = session()->getId();
//         $cartKey = "cart:$sessionId";

//         $cart = Redis::get($cartKey) ? json_decode(Redis::get($cartKey), true) : [];

//         if (isset($cart[$request->product_id])) {
//             $cart[$request->product_id]['quantity'] = $request->quantity;

//             Redis::set($cartKey, json_encode($cart));

//             return response()->json(['message' => 'Cart updated!', 'cart' => $cart]);
//         }

//         return response()->json(['message' => 'Product not found in cart!'], 404);
//     }

//     // Remove Cart Item
//     public function remove(Request $request)
//     {
//         $sessionId = session()->getId();
//         $cartKey = "cart:$sessionId";

//         $cart = Redis::get($cartKey) ? json_decode(Redis::get($cartKey), true) : [];

//         if (isset($cart[$request->product_id])) {
//             unset($cart[$request->product_id]);

//             Redis::set($cartKey, json_encode($cart));

//             return response()->json(['message' => 'Product removed from cart!', 'cart' => $cart]);
//         }

//         return response()->json(['message' => 'Product not found in cart!'], 404);
//     }

//     // Clear the Cart
//     public function clear()
//     {
//         $sessionId = session()->getId();
//         $cartKey = "cart:$sessionId";

//         Redis::del($cartKey);

//         return response()->json(['message' => 'Cart cleared!']);
//     }
// }