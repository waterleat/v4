<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Family extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'latin', 'description'];

    /**
     * Get the plantTypes for the family.
     */
    public function plantTypes(): HasMany
    {
        return $this->hasMany(PlantType::class);
    }
}
