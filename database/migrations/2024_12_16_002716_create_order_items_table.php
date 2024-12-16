<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade'); // Foreign Key to `orders`
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade'); // Foreign Key to `products`
            $table->unsignedInteger('quantity')->default(1); // Quantity of the product
            $table->timestamps(); // created_at and updated_at
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
