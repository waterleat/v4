<?php

use App\Models\Family;
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
        Schema::create('plant_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('latin');
            $table->foreignIdFor(Family::class);
            $table->boolean('perennial');
            $table->string('dates_best_sow')->nullable();
            $table->string('dates_main_harvest')->nullable();
            $table->string('feeder_type')->nullable();
            $table->string('root_depth')->nullable();
            $table->string('mulch')->nullable();
            $table->string('fertiliser')->nullable();
            $table->string('when_to_fertilise')->nullable();
            $table->integer('multisow')->nullable();
            $table->string('hardiness_young_plants')->nullable();
            $table->string('competitor')->nullable();
            $table->text('competition_period')->nullable();
            $table->string('companions')->nullable();
            $table->string('interplant_into')->nullable();
            $table->string('interplant_with')->nullable();
            $table->string('relay_plant_into')->nullable();
            $table->string('relay_plant_with')->nullable();
            $table->string('germ_temp_img')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plant_types');
    }
};
