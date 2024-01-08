<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Journal extends Model
{
    use HasFactory;

    protected $fillable = ['plan_id', 'variety_id', 'location_id', 'sown_direct',
        'sown', 'germinated', 'planted', 'first_harvest', 'last_harvest', 
        'sowing_locn', 'nursery_locn', 'growing_locn'
    ];

    protected $casts = [
        'sown' => 'datetime',
        'germinated' => 'datetime',
        'planted' => 'datetime',
        'first_harvest' => 'datetime',
        'last_harvest' => 'datetime',
    ];  // :Y-m-d'];        // d/m/Y',];

    /**
     * Get the plan that owns the journal.
     */
    public function plan(): BelongsTo
    {
        return $this->belongsTo(Plan::class);
    }

    /**
     * Get the variety that owns the journal.
     */
    public function variety(): BelongsTo
    {
        return $this->belongsTo(Variety::class);
    }

    /**
     * estimated planting date from a given sown date
     * datetime obj with time=0
     */
    public function estimatedCropingDate($interval)
    {
        // return date_format(date_add($this->sown,
        //     date_interval_create_from_date_string("$interval days")),
        //     "d M Y");
        return $this->sown->adddays($interval)->format('d M Y');
    }

    // public function estimatedFirstHarvestDate($maturity)
    // {
    //     return date_add($this->sown,
    //         date_interval_create_from_date_string("$maturity days"));
    // }

    // public function estimatedLastHarvestDate($maturity)
    // {
    //     return date_add($this->sown,
    //         date_interval_create_from_date_string("$maturity days"));
    // }

}
