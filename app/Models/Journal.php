<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Journal extends Model
{
    use HasFactory;

    protected $fillable = ['succession_id', 'variety_id', 'variety', 
    'sown', 'planted', 'first_harvest', 'last_harvest', 'sow_direct', ];

    protected $casts = [
        'sown' => 'date',
        'planted' => 'date',
        'first_harvest' => 'date',
        'last_harvest' => 'date',
    ];  // :Y-m-d'];        // d/m/Y',];

    /**
     * Get the plantType that owns the variety.
     */
    public function succession(): BelongsTo
    {
        return $this->belongsTo(Succession::class);
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
