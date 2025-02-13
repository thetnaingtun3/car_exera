<?php

namespace App\Models;

use App\Models\LSP;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CarRegistration extends Model
{
    protected $fillable = [
        'lsp_id',
        'customer_id',
        'car_id',
        'car_number',
        'cusomter_name', // Note: Typo here, should it be 'customer_name'?
        'driver_name',
        'driver_id',
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
        'licence_plate',
        'size',


    ];
    public function products(): HasMany
    {
        return $this->hasMany(CarRegisterProduct::class, 'car_registration_id');
    }

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
//        return $this->belongsTo(Truck::class, 'car_id');
        return $this->belongsTo(Truck::class, 'car_id', 'id');
    }
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
        $query->where('driver_name', 'like', "%{$value}%")
            ->orWhere('order_number', 'like', "%{$value}%")
            ->orWhereHas('lsp', function ($query) use ($value) {
                $query->where('lsp_name', 'like', "%{$value}%"); // Assuming 'name' is a column in the LSP model
            })
            ->orWhereHas('truck', function ($query) use ($value) {
                $query->where('licence_plate', 'like', "%{$value}%"); // Assuming 'name' is a column in the LSP model
            })
            ->orWhereHas('customer', function ($query) use ($value) {
                $query->where('customer_name', 'like', "%{$value}%"); // Assuming 'name' is a column in the LSP model
            });
    }
}
