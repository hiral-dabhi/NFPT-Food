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
        Schema::create('staff_has_restaurant', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('staff_id')->index()->nullable();
            $table->unsignedBigInteger('restaurant_id')->index()->nullable();
            $table->timestamps();
            $table->foreign('staff_id')->references('id')->on('users');
            $table->foreign('restaurant_id')->references('id')->on('restaurant_master');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff_has_restaurants');
    }
};
