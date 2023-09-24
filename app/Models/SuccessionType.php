<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SuccessionType extends Model
{
    use HasFactory;
    
    protected $fillable = ['name'];


    /**
     * Get the successions for the succession type.
     */
    public function successions(): HasMany
    {
        return $this->hasMany(Succession::class);
    }
}