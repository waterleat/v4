<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Succession extends Model
{
    use HasFactory;

    protected $fillable = [
        'succession_type_id', 'plant_type_id', 'varieties_recommended', 
        'cd', 'sow', 'plant', 'first_harvest', 'last_harvest', 
        'sow_start', 'sow_end', 'plant_start', 'plant_end', 'harvest_start', 'harvest_end', 
        'days_nursery', 'days_maturity', 'days_harvest', 
        'start_seeds', 'grow_seedlings', 'grow_plants', 'planting_density', 
        'variety_notes', 'growing_notes', 'yield_notes', 
    ];

    /**
     * Get the plantType that owns the variety.
     */
    public function plantType(): BelongsTo
    {
        return $this->belongsTo(PlantType::class);
    }

    /**
     * Get the plantType that owns the variety.
     */
    public function successionType(): BelongsTo
    {
        return $this->belongsTo(SuccessionType::class);
    }
}
