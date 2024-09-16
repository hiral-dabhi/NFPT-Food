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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('restaurant_id')->index()->nullable();
            $table->unsignedBigInteger('category_id')->index()->nullable();
            $table->unsignedBigInteger('sub_category_id')->index()->nullable();
            $table->text('title')->nullable();
            $table->text('price')->nullable();
            $table->string('image')->nullable();
            $table->string('description')->nullable();
            $table->string('tag')->nullable();
            $table->enum('in_stock', ['0', '1'])->default('0')->comment("0-Yes, 1-No");
            $table->enum('type', ['0', '1'])->default('0')->comment("0-veg, 1-nonveg");
            $table->text('status', ['0', '1'])->default('0')->comment("0-active, 1-inactive");
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('restaurant_id')->references('id')->on('restaurant_master');
            $table->foreign('category_id')->references('id')->on('category_master');
            $table->foreign('sub_category_id')->references('id')->on('sub_category');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
