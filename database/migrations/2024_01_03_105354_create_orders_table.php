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
        Schema::create('orders', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->integer('unique_id')->unique();
            $table->ulid('user_id');
            $table->ulid('coupon_id')->nullable();
            $table->json('order_details');
            $table->longText('order_notes')->nullable();
            $table->integer('total');
            $table->integer('coupon_discount')->nullable();
            $table->string('order_status'); //pending payment, payment failed, payment successful, transaction error, pending bank response
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('coupon_id')
                ->references('id')
                ->on('coupons')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
