<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    use HasFactory;

    protected $fillable = ['variety', 'variety_id', 'sown'];

    protected $casts = ['sown' => 'date'];  // :Y-m-d'];        // d/m/Y',];
}
