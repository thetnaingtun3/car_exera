<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['name', 'address'];

    public function scopeSearch($query, $value)
    {
        $query->where(function ($q) use ($value) {
            $q->where('name', 'like', "%{$value}%")
                ->orWhere('address', 'like', "%{$value}%");
        });
    }
}
