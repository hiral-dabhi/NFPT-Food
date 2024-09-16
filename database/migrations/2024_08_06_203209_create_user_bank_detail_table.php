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
        Schema::create('user_bank_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index()->nullable();
            $table->text('account_number')->nullable();
            $table->text('account_holder_name')->nullable();
            $table->text('bank_name')->nullable();
            $table->text('bank_address')->nullable();
            $table->text('branch_number')->nullable();
            $table->text('institute_number')->nullable();
            $table->text('routing_number')->nullable();
            $table->text('swift_bic_code')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
      
    }
};
