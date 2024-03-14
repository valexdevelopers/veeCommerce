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
        Schema::create('product_reviews', function (Blueprint $table) {
            $table->id();
            $table->ulid('product_id');
            $table->ulid('order_id');
            $table->ulid('user_id')->nullable();
            $table->integer('number_of_stars');
            $table->string('review_comment')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('Cascade');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('set null');
            $table->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onDelete('Cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_reviews');
    }
};
