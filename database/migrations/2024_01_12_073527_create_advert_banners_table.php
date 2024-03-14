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
        Schema::create('advert_banners', function (Blueprint $table) {
            $table->id();
            $table->string('banner_image');
            $table->ulid('admin_id')->nullable();
            $table->string('banner_name');
            $table->string('visibility');
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
        Schema::dropIfExists('advert_banners');
    }
};
