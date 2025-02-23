<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PalletChangeDateHistory extends Model
{
    protected $fillable = [
        'history_date',
        'pallet_register_id',
    ];
}
