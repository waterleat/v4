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
        Schema::table('varieties', function (Blueprint $table) {
            $table->boolean('sow_direct');
            $table->integer('multi')->nullable();
            $table->integer('spacing')->nullable();
            $table->string('sowing')->nullable();
            $table->string('harvest')->nullable();
            $table->string('store')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('varieties', function (Blueprint $table) {
            //
        });
    }
};
