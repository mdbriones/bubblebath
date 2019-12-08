<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Outparts extends Model
{
    protected $fillable = [
        'out_date',
        'description',
        'quantity',
        'amount',
        'supplier',
        'paid',
    ];
}
