<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Customer extends Model
{
    protected $fillable = ['lsp_id', 'customer_code', 'status', 'customer_name'];

    public function scopeSearch($query, $value)
    {
        $query->where('customer_code', 'like', "%{$value}%")
            ->orWhere('customer_name', 'like', "%{$value}%")
            ->orWhereHas('lsp', function ($query) use ($value) {
                $query->where('lsp_name', 'like', "%{$value}%"); // Assuming 'name' is a column in the LSP model
            });
    }

    public function lsp(): BelongsTo
    {
        return $this->belongsTo(LSP::class, 'lsp_id');
    }
}
