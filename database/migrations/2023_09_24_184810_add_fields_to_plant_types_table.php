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
        Schema::table('plant_types', function (Blueprint $table) {
            $table->boolean('perennial');
            $table->text('dates_best_sow')->nullable();
            $table->text('dates_main_harvest')->nullable();
            $table->text('feeder_type')->nullable();
            $table->text('root_depth')->nullable();
            $table->text('mulch')->nullable();
            $table->text('fertiliser')->nullable();
            $table->text('when_to_fertilise')->nullable();
            $table->integer('multisow')->nullable();
            $table->text('hardiness_young_plants')->nullable();
            $table->text('competitor')->nullable();
            $table->text('competition_period')->nullable();
            $table->text('companions')->nullable();
            $table->text('interplant_into')->nullable();
            $table->text('interplant_with')->nullable();
            $table->text('relay_plant_into')->nullable();
            $table->text('relay_plant_with')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('plant_types', function (Blueprint $table) {
            //
        });
    }
};