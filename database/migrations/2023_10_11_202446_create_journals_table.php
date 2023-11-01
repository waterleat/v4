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
        Schema::create('journals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('succession_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('variety_id')->nullable()->constrained()->onDelete('cascade');
            $table->timestamp('sown');
            $table->boolean('sow_direct');
            $table->timestamp('planted')->nullable();
            $table->timestamp('first_harvest')->nullable();
            $table->timestamp('last_harvest')->nullable();
            $table->timestamps();
            $table->string('variety')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('journals');
    }
};
