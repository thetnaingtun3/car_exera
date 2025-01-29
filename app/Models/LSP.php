<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LSP extends Model
{
    protected $fillable = ['lsp_name','status'];

    public function scopeSearch($query, $value)
    {
        $query->where('lsp_name', 'like', "%{$value}%");
    }
}
