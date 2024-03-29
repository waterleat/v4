<?php

namespace App\Models;

// use App\Enums\JournalStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Plan extends Model
{
    use HasFactory;

    protected $casts = [
        'sow_start' => 'datetime',
        'sow_end' => 'datetime',
        'plant_start' => 'datetime',
        'plant_end' => 'datetime',
        'harvest_start' => 'datetime',
        'harvest_end' => 'datetime',
        'sown' => 'datetime',
        'germinated' => 'datetime',
        'planted' => 'datetime',
        'first_cropped' => 'datetime',
        'last_cropped' => 'datetime',
    ];

    protected $fillable = [
        'succession_id',
        'sow_start', 'sow_end', 'plant_start', 'plant_end', 'harvest_start', 'harvest_end',
        'days_nursery', 'days_maturity', 'days_harvest',
        'sow', 'plant', 'first_harvest', 'last_harvest',
        'locn_sowing', 'locn_nursery', 'locn_growing',
        'sown', 'germinated', 'planted', 'first_cropped', 'last_cropped',
        'plan_status_id',
    ];

    /**
     * Get the succession that owns the plan.
     */
    public function succession(): BelongsTo
    {
        return $this->belongsTo(Succession::class);
    }

    /**
     * Get the planStatus that owns the plan.
     */
    public function planStatus(): BelongsTo
    {
        return $this->belongsTo(PlanStatus::class);
    }

    /**
     * Get the journal that is for the plan.
     */
    public function journal(): HasOne
    {
        return $this->hasOne(Journal::class);
    }
}
