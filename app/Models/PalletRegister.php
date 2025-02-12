<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PalletRegister extends Model
{
    protected $fillable = [
        'pallet_number',
        'product_type',
        'production_line',
        'package',
        'volume',
        'unit',
        'total_amount_per_pallet',
        'qr_code',
        'click_date',
        'status',
    ];

    public function scopeFilterByDate($query, $startDate, $endDate)

    {
        // dd($startDate, $endDate);
        if ($startDate) {
            $query->whereDate('created_at', '>=', $startDate);
        }
        if ($endDate) {
            $query->whereDate('created_at', '<=', $endDate);
        }

        return $query;
    }

    public function scopeSearch($query, $value)
    {
        // Remove "PLT - " prefix if present
        $cleanValue = preg_replace('/^PLT\s*-\s*/', '', $value);

        return $query->where('pallet_number', 'like', "%{$cleanValue}%")
            ->orWhere('product_type', 'like', "%{$value}%")
            ->orWhere('production_line', 'like', "%{$value}%")
            ->orWhere('volume', 'like', "%{$value}%")
            ->orWhere('unit', 'like', "%{$value}%")
            ->orWhere('total_amount_per_pallet', 'like', "%{$value}%");
    }
}
