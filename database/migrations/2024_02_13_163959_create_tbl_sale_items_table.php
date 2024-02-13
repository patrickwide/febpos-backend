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
        Schema::create('tbl_sale_items', function (Blueprint $table) {
            $table->id('sale_item_id');
            $table->foreignId('product_id')->constrained('tbl_products', 'product_id');
            $table->foreignId('sale_id')->constrained('tbl_sales', 'sale_id');
            $table->integer('quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_sale_items');
    }
};
