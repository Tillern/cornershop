<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductFilterTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function products_can_be_filtered_by_category()
    {
        $category1Product = Product::factory()->create(['category_id' => 1]);
        $category2Product = Product::factory()->create(['category_id' => 2]);

        $response = $this->get('/products?category=1');

        $response->assertStatus(200);
        $response->assertSee($category1Product->name);
        $response->assertDontSee($category2Product->name);
    }

    /** @test */
    public function products_can_be_sorted_by_latest()
    {
        $oldProduct = Product::factory()->create(['created_at' => now()->subDays(10)]);
        $newProduct = Product::factory()->create(['created_at' => now()]);

        $response = $this->get('/products?sort=latest');

        $response->assertStatus(200);
        $response->assertSeeInOrder([$newProduct->name, $oldProduct->name]);
    }
}