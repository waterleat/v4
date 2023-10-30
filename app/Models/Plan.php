<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = ['succession_id', 'locn_growing', ];

    /**
     * Get the succession that owns the plan.
     */
    public function succession(): BelongsTo
    {
        return $this->belongsTo(Succession::class);
    }



}
