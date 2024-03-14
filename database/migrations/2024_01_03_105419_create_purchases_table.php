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
        Schema::create('purchases', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->integer('unique_id')->unique();
            $table->ulid('user_id');
            $table->ulid('order_id');
            $table->string('reference');
            $table->string('receipt_number');
            $table->string('status');
            $table->json('order_details');
            $table->json('authorization');
            $table->json('customer');
            $table->integer('requested_amount');
            $table->integer('paidamount');
            $table->timestamp('transaction_date')->nullable();
            $table->timestamp('paidAt')->nullable();
            $table->integer('gatewayfees');
            $table->string('channel');
            $table->string('currency');
            $table->string('gateway_response');
            $table->timestamps();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
