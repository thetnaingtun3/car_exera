<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CarRegisterProduct extends Model
{
    //
    protected $fillable = [
        'car_registration_id',
        'product',
        'package',
        'qty',
        'unit',
    ];

    public function carRegistration(): BelongsTo
    {
        return $this->belongsTo(CarRegistration::class, 'car_registration_id');
    }
}
