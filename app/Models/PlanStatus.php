<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PlanStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'colour',
    ];

    /**
     * Get the plans for the plan status.
     */
    public function plans(): HasMany
    {
        return $this->hasMany(Plan::class);
    }
}
