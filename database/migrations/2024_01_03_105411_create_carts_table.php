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
        Schema::create('carts', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->ulid('user_id')->nullable();
            $table->ulid('inventory_id')->nullable();
            $table->ulid('product_id');
            $table->string('session_id');
            $table->string('color')->nullable();
            $table->string('size')->nullable();
            $table->integer('price');
            $table->integer('quantity');
            $table->integer('subtotal');
            $table->timestamps();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('set null');
            $table->foreign('inventory_id')
                ->references('id')
                ->on('inventories')
                ->onDelete('set null');
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
