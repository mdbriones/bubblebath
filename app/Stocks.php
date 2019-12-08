<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stocks extends Model
{
    protected $fillable = [
        "stocks_date",
        "supplier",
        "reference",
        "description",
        "quantity",
        "amount",
    ];
}
