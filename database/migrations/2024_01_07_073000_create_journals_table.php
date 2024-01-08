<?php

use App\Models\Plan;
use App\Models\Variety;
use App\Models\Location;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('journals', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Plan::class);
            $table->timestamp('sown');
            $table->foreignIdFor(Variety::class);
            $table->boolean('sown_direct')->default(false);
            $table->foreignIdFor(Location::class);
            $table->bigInteger('sowing_locn')->nullable();
            $table->bigInteger('nursery_locn')->nullable();
            $table->bigInteger('growing_locn')->nullable();
            $table->timestamp('germinated')->nullable();
            $table->timestamp('planted')->nullable();
            $table->timestamp('first_harvest')->nullable();
            $table->timestamp('last_harvest')->nullable();
            $table->timestamps();
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
