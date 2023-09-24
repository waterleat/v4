<?php

use App\Models\PlantType;
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
        Schema::create('varieties', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('info');
            $table->text('description');
            $table->foreignId('plant_type_id')->nullable()->constrained()->onDelete('cascade');
            $table->decimal('height');
            $table->decimal('spread');
            $table->integer('days2maturity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('varieties');
    }
};
