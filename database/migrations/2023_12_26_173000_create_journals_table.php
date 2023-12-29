<?php

use App\Models\Plan;
use App\Models\Variety;
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
            $table->foreignIdFor(Plan::class);
            $table->timestamp('sown');
            $table->foreignIdFor(Variety::class);
            $table->boolean('sown_direct')->default(false);
            $table->string('nursery_locn')->nullable();
            $table->string('growing_locn')->nullable();
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
