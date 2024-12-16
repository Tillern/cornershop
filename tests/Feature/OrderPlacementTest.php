<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OrderPlacementTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_customer_can_place_an_order()
    {
        $this->withoutExceptionHandling();

        // Simulate a user
        $user = User::factory()->create();

        // Simulate a cart session
        session()->put('cart', [
            ['product_id' => 1, 'quantity' => 2, 'price' => 100],
            ['product_id' => 2, 'quantity' => 1, 'price' => 50],
        ]);

        // Send order data
        $response = $this->actingAs($user)->post('/customer/orders', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'address' => '123 Laravel St',
            'phone' => '1234567890',
        ]);

        // Assert redirect to order details
        $response->assertRedirect('/customer/orders/1');

        // Assert order is created
        $this->assertDatabaseHas('orders', [
            'customer_name' => 'John Doe',
            'customer_email' => 'john@example.com',
        ]);

        // Assert order items are created
        $this->assertDatabaseHas('order_items', ['product_id' => 1, 'quantity' => 2]);
        $this->assertDatabaseHas('order_items', ['product_id' => 2, 'quantity' => 1]);
    }
}