<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Variety extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'info', 'description', 
    'plant_type_id', 'height', 'spread', 'days2maturity',
    'sow_direct', 'multi', 'spacing', 
    'sowing', 'harvest', 'store', 
    ];


    /**
     * Get the plantType that owns the variety.
     */
    public function plantType(): BelongsTo
    {
        return $this->belongsTo(PlantType::class);
    }

    /**
     * Get the journals for the variety.
     */
    public function journals(): HasMany
    {
        return $this->hasMany(Journal::class);
    }
    
    /**
     * The successions that belong to the Variety
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function successions(): BelongsToMany
    {
        return $this->belongsToMany(Succession::class);
    }

}