<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CartTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_product_can_be_added_to_the_cart()
    {
        $product = Product::factory()->create();
        
        $response = $this->post('/cart/add', [
            'product_id' => $product->id,
            'quantity' => 2,
        ]);

        $response->assertStatus(200);
        $response->assertSessionHas('cart');
        $this->assertEquals(session('cart')[0]['product_id'], $product->id);
        $this->assertEquals(session('cart')[0]['quantity'], 2);
    }

    /** @test */
    public function a_product_can_be_removed_from_the_cart()
    {
        $product = Product::factory()->create();

        // Add product to cart first
        $this->post('/cart/add', [
            'product_id' => $product->id,
            'quantity' => 2,
        ]);

        $response = $this->post('/cart/remove', [
            'product_id' => $product->id,
        ]);

        $response->assertStatus(200);
        $this->assertSessionMissing('cart');
    }

    /** @test */
    public function a_customer_can_view_the_cart()
    {
        $product = Product::factory()->create();

        // Add product to cart
        $this->post('/cart/add', [
            'product_id' => $product->id,
            'quantity' => 1,
        ]);

        $response = $this->get('/cart');
        
        $response->assertStatus(200);
        $response->assertSee($product->name);
        $response->assertSee(1); // Quantity
    }
}