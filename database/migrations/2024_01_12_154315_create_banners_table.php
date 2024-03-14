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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->ulid('admin_id')->nullable();
            $table->string('banner_1');
            $table->string('banner_2')->nullable();
            $table->string('banner_3')->nullable();
            $table->string('side_banner_1')->nullable();
            $table->string('side_banner_2')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('banners');
    }
};
