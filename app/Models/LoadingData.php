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
        'date',
        'truck_number',

    ];
    public function scopeSearch($query, $value)
    {
        return $query->where('truck_number', 'like', "%{$value}%")
            ->orWhere('delivery_order_number', 'like', "%{$value}%")
            ->orWhere('lsp_name', 'like', "%{$value}%")
            ->orWhere('customer_name', 'like', "%{$value}%")
            ->orWhere('truck_type', 'like', "%{$value}%")
            ->orWhere('truck_driver_name', 'like', "%{$value}%")
            ->orWhere('product_type', 'like', "%{$value}%")
            ->orWhere('volume', 'like', "%{$value}%")
            ->orWhere('production_line', 'like', "%{$value}%")
            ->orWhere('pallet_number', 'like', "%{$value}%");
    }
}
