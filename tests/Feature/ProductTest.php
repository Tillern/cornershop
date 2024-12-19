<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;
use App\Models\Category;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_lists_all_products()
    {

        $category = Category::factory()->create([
            "name"=>"foot wear",
        ]); 

        $products = Product::factory()->count(3)->create([
            "name" => "Gumboots",
            "description"=>"words here",
            "price" =>10,
            "stock"=>30,
            "image" =>"imagepath",
            'category_id' => $category->id,
        ]);

        $this->get(route('admin.products.index'))
            ->assertStatus(200)
            ->assertViewHas('products', $products);
    }
}
