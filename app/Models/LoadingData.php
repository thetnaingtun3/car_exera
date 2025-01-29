<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoadingData extends Model
{
    protected $fillable = [
        'delivery_date',
        'delivery_order_number',
        'lsp_name',
        'customer_name',
        'truck_type',
        'truck_driver_name',
        'product_type',
        'volume',
        'production_line',
        'pallet_number',
    ];
}
