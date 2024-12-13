<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function add(Request $request)
{
    $cart = Redis::get('cart') ? json_decode(Redis::get('cart'), true) : [];
    $cart[] = $request->all();
    Redis::set('cart', json_encode($cart));
    return response()->json(['message' => 'Product added to cart'], 200);
}

public function remove($id)
{
    $cart = json_decode(Redis::get('cart'), true);
    $cart = array_filter($cart, fn($item) => $item['id'] !== $id);
    Redis::set('cart', json_encode($cart));
    return response()->json(['message' => 'Product removed from cart'], 200);
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
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
