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
        Schema::create('currency', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('country_id')->index()->nullable();
            $table->text('title')->nullable();
            $table->string('sign')->nullable();
            $table->string('image')->nullable();
            $table->enum('status', ['0', '1'])->default('0')->comment("0-active, 1-inAcdtive");
            $table->timestamps();
            $table->foreign('country_id')->references('id')->on('countries');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('currenies');
    }
};