<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_customer_can_place_an_order()
    {
        $product = Product::factory()->create();

        // Add product to cart
        $this->post('/cart/add', [
            'product_id' => $product->id,
            'quantity' => 1,
        ]);

        // Simulate placing an order
        $response = $this->post('/orders', [
            'address' => '123 Test Street',
            'phone' => '1234567890',
        ]);

        $response->assertStatus(302); // Redirect to confirmation page
        $this->assertDatabaseHas('orders', ['address' => '123 Test Street']);
    }

    /** @test */
    public function an_order_contains_products()
    {
        $product = Product::factory()->create();
        $this->post('/cart/add', [
            'product_id' => $product->id,
            'quantity' => 2,
        ]);

        $response = $this->post('/orders', [
            'address' => '123 Test Street',
            'phone' => '1234567890',
        ]);

        $response->assertStatus(302);
        $order = Order::first();
        $this->assertTrue($order->products()->count() > 0);
    }
}