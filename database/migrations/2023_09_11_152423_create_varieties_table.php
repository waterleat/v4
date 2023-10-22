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
            $table->foreignId('plant_type_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('info');
            $table->text('description');
            $table->decimal('height');
            $table->decimal('spread');
            $table->integer('days2maturity');
            $table->boolean('sow_direct');
            $table->integer('multi')->nullable();
            $table->integer('spacing')->nullable();
            $table->string('sowing')->nullable();
            $table->string('harvest')->nullable();
            $table->string('store')->nullable();
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
