<?php

use App\Models\Succession;
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
        Schema::create('succession_variety', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Succession::class);
            $table->foreignIdFor(Variety::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('succession_variety');
    }
};
