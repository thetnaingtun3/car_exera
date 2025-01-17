<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['customer_code', 'lsp_name', 'customer_name'];

    public function scopeSearch($query, $value)
    {
        $query->where(function ($q) use ($value) {
            $q->where('customer_name', 'like', "%{$value}%")
                ->orWhere('customer_code', 'like', "%{$value}%")
                ->orWhere('lsp_name', 'like', "%{$value}%");
        });
    }
}
