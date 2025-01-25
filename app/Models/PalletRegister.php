<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PalletRegister extends Model
{
    protected $fillable = [
        'pallet_number',
        'product_type',
        'production_line',
        'volume',
        'unit',
        'total_amount_per_pallet',
        'qr_code',
        'click_date',
        'status',
    ];
}
