<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Succession extends Model
{
    use HasFactory;

    protected $fillable = [
        'succession_type_id',  'plant_type_id', 
        'sow', 'plant', 'firstHarvest', 'lastHarvest', 'varieties_recommended',
        'start_seeds', 'grow_seedlings', 'grow_plants', 'planting_density', 
        'variety_notes', 'growing_notes', 'yeild_notes'
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
