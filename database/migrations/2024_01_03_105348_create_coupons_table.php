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
        Schema::create('coupons', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->integer('unique_id')->unique();
            $table->string('coupon_code');
            $table->integer('coupon_worth');
            $table->integer('max_value');
            $table->integer('usuage')->nullable();
            $table->string('coupon_resctriction')->nullable(); // new users, site wide, specific products,verified purchase users 
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
