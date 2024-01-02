<?php

use App\Models\PlantType;
use App\Models\SuccessionType;
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
            $table->foreignIdFor(SuccessionType::class);
            $table->foreignIdFor(PlantType::class);
            $table->boolean('cd');
            $table->string('varieties_recommended')->nullable();
            $table->string('sow')->nullable();
            $table->string('plant')->nullable();
            $table->string('first_harvest')->nullable();
            $table->string('last_harvest')->nullable();
            $table->integer('sow_start')->nullable();
            $table->integer('sow_end')->nullable();
            $table->integer('plant_start')->nullable();
            $table->integer('plant_end')->nullable();
            $table->integer('harvest_start')->nullable();
            $table->integer('harvest_end')->nullable();
            $table->integer('days_nursery')->default(28);
            $table->integer('days_maturity')->default(60);
            $table->integer('days_harvest')->default(30);
            $table->string('start_seeds')->nullable();
            $table->string('grow_seedlings')->nullable();
            $table->string('grow_plants')->nullable();
            $table->text('planting_density')->nullable();
            $table->text('variety_notes')->nullable();
            $table->text('growing_notes')->nullable();
            $table->text('yield_notes')->nullable();
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
