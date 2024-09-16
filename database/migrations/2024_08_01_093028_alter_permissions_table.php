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
        Schema::table('permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('parent_id')->index()->after('id');
            $table->string('description')->nullable()->after('parent_id');
            $table->enum('type', ['0', '1'])->default('0')->after('description')->comment("0-Admin, 1-User");
            $table->foreign('parent_id')->references('id')->on('permissions')->onUpdate('cascade')->onDelete('no action');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('permissions', function (Blueprint $table) {
            $table->dropForeign(['parent_id']);
            $table->dropColumn(['parent_id', 'description', 'type']);
        });
    }
};
