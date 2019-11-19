<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carwash extends Model
{
    protected $table  = "carwash";

    protected $fillable = [
        'customerName',
        'plateNumber',
        'model',
        'email',
        'dateOfService',
        'bodyWash',
        'handWax',
        'engineWash',
        'armorAll',
        'orbitalWax',
        'underWash',
        'asphaltRemoval',
        'seatCover',
        'leatherConditioning',
        'interior',
        'exterior',
        'glassDetail',
        'engineDetail',
        'full',
        'payment_method',
        'paid',
        'emp_group',
        'is_delete'
    ];

    protected $casts = [
        "full" => "float",
    ];

}
