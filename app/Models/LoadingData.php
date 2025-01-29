<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoadingData extends Model
{
    protected $fillable = [
        'pallet_number',
        'product_type',
        'production_line',
        'package_type',
        'volume',
        'unit',
        'total',
        'date',
        'car_number',
    ];
}
