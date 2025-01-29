<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Truck extends Model
{
    protected $fillable = [
        'lsp_id',
        'licence_plate',
        'vehicle_type',
        'driver_name',
        'size',
        'status',
    ];
    public function scopeSearch($query, $value)
    {
        $query->where('licence_plate', 'like', "%{$value}%")
            ->orWhere('vehicle_type', 'like', "%{$value}%")
            ->orWhere('size', 'like', "%{$value}%")
            ->orWhere('driver_name', 'like', "%{$value}%")

            ->orWhereHas('lsp', function ($query) use ($value) {
                $query->where('lsp_name', 'like', "%{$value}%"); // Assuming 'name' is a column in the LSP model
            });
    }



    public function lsp(): BelongsTo
    {
        return $this->belongsTo(LSP::class, 'lsp_id');
    }
}
