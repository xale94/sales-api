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
        Schema::create('shops_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('shop_id')->unsigned();
            $table->unsignedBiginteger('product_id')->unsigned();
            $table->integer('quantity');
            $table->foreign('shop_id')->references('id')
                 ->on('shops')->onDelete('cascade');
            $table->foreign('product_id')->references('id')
                ->on('products')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shops_products');
    }
};
