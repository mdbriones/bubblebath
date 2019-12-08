<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $table = "shop";
    
    protected $fillable = [
        'name_',
        'plateNumber_',
        'make_model_',
        'date_',
        'email_',
        'terms_',
        'service_description_',
        'service_amount_',
        'is_delete'
    ];

}
