<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 8, 2);
            $table->integer('stock');
            $table->string('image');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
        });
    }

   
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropColumn(['name', 'description', 'price', 'stock', 'image', 'category_id']);
        });
    }
};
