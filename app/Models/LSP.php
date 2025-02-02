<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LSP extends Model
{
    protected $fillable = ['lsp_name', 'status'];

    public function scopeSearch($query, $value)
    {
        $query->where('lsp_name', 'like', "%{$value}%");
    }
    // Relationship with Customers
    public function customers()
    {
        return $this->hasMany(Customer::class, 'lsp_id');
    }

    // Relationship with Trucks
    public function trucks()
    {
        return $this->hasMany(Truck::class, 'lsp_id');
    }
}
