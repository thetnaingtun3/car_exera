<?php

namespace App\Models;

use App\Models\LSP;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CarRegistration extends Model
{
    protected $fillable = [
        'lsp_id',
        'customer_id',
        'car_id',
        'car_number',
        'cusomter_name', // Note: Typo here, should it be 'customer_name'?
        'driver_name',
        'type_of_truck',
        'type_of_truck_type',
        'product',
        'package',
        'qty',
        'unit',
        'order_number',
        'remark',
        'qr_code',
        'click_date',
        'status',
    ];

    public function lsp(): BelongsTo
    {
        return $this->belongsTo(LSP::class);
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
    public function truck(): BelongsTo
    {
        return $this->belongsTo(Truck::class, 'car_id');
    }
}
