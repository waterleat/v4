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
        Schema::create('successions', function (Blueprint $table) {
            $table->id();
            // $table->string('name');
            // $table->string('type');
            $table->foreignId('succession_type_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('plant_type_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('sow');
            $table->string('plant');
            $table->string('firstHarvest');
            $table->string('lastHarvest');
            $table->string('varieties_recommended')->nullable();
            $table->string('start_seeds')->nullable();
            $table->string( 'grow_seedlings')->nullable();
            $table->string( 'grow_plants')->nullable();
            $table->text('planting_density')->nullable();
            $table->text('variety_notes')->nullable();
            $table->text( 'growing_notes')->nullable();
            $table->text( 'yeild_notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('successions');
    }
};
