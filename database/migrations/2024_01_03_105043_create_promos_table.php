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
        Schema::create('promos', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->integer('unique_id')->unique();
            $table->ulid('admin_id')->nullable();
            $table->string('discount_name');
            $table->string('discount_type');
            $table->integer('discount_value');
            $table->integer('discount_max_value')->nullable();
            $table->timestamp('discount_start_date');
            $table->timestamp('discount_end_date')->nullable();
            $table->boolean('status')->default(false);
            $table->json('products')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('admin_id')
                ->references('id')
                ->on('admins')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promos');
    }
};
