<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OrderDetailsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_customer_can_view_order_details()
    {
        $this->withoutExceptionHandling();

        // Create a user and an order
        $user = User::factory()->create();
        $order = Order::factory()->create([
            'customer_name' => 'John Doe',
            'customer_email' => 'john@example.com',
        ]);

        // Simulate order items
        $order->items()->create([
            'product_id' => 1,
            'quantity' => 2,
            'price' => 100,
        ]);

        $response = $this->actingAs($user)->get("/customer/orders/{$order->id}");

        $response->assertStatus(200);
        $response->assertSee('John Doe');
        $response->assertSee('Product ID: 1');
        $response->assertSee('Quantity: 2');
    }
}