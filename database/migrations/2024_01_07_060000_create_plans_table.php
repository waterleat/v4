<?php

use App\Models\Journal;
use App\Models\PlanStatus;
use App\Models\Succession;
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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Succession::class);
            $table->dateTime('sow_start')->nullable();
            $table->dateTime('sow_end')->nullable();
            $table->dateTime('plant_start')->nullable();
            $table->dateTime('plant_end')->nullable();
            $table->dateTime('harvest_start')->nullable();
            $table->dateTime('harvest_end')->nullable();
            $table->integer('days_nursery')->default(28);
            $table->integer('days_maturity')->default(60);
            $table->integer('days_harvest')->default(30);
            // $table->dateTime('sown')->nullable();
            // $table->string('locn_sowing')->nullable();
            // $table->dateTime('germinated')->nullable();
            // $table->string('locn_nursery')->nullable();
            // $table->dateTime('planted')->nullable();
            $table->string('locn_growing')->nullable();
            // $table->dateTime('first_cropped')->nullable();
            // $table->dateTime('last_cropped')->nullable();
            $table->foreignIdFor(PlanStatus::class)->default(1);
            // $table->foreignIdFor(Journal::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};
