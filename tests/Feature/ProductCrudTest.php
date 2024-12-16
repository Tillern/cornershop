<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductCrudTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_guest_can_view_products()
    {
        $product = Product::factory()->create();

        $response = $this->get('/products');

        $response->assertStatus(200);
        $response->assertSee($product->name);
    }

    /** @test */
    public function a_product_can_be_added_to_the_database()
    {
        $productData = [
            'name' => 'Test Product',
            'description' => 'Test description for the product',
            'price' => 99.99,
            'category_id' => 1, // Assuming a category exists
        ];

        $response = $this->post('/products', $productData);

        $response->assertStatus(302); // Expecting a redirect after a successful creation
        $this->assertDatabaseHas('products', ['name' => 'Test Product']);
    }

    /** @test */
    public function a_product_can_be_updated()
    {
        $product = Product::factory()->create();
        
        $updatedData = [
            'name' => 'Updated Product',
            'description' => 'Updated description',
            'price' => 120.99,
            'category_id' => 1,
        ];

        $response = $this->put("/products/{$product->id}", $updatedData);

        $response->assertStatus(302); // Expecting a redirect after a successful update
        $this->assertDatabaseHas('products', ['name' => 'Updated Product']);
    }

    /** @test */
    public function a_product_can_be_deleted()
    {
        $product = Product::factory()->create();

        $response = $this->delete("/products/{$product->id}");

        $response->assertStatus(302); // Expecting a redirect after a successful deletion
        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }
}