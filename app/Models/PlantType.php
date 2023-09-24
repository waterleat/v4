<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PlantType extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'latin', 'family_id'];

    /**
     * Get the family that owns the plantType.
     */
    public function family(): BelongsTo
    {
        return $this->belongsTo(Family::class);
    }

    /**
     * Get the varieties for the plant type.
     */
    public function varieties(): HasMany
    {
        return $this->hasMany(Variety::class);
    }

    /**
     * Get the successions for the plant type.
     */
    public function successions(): HasMany
    {
        return $this->hasMany(Succession::class);
    }
}
