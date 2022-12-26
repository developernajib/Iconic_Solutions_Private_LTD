<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TotalSupply extends Model
{
    use HasFactory;

    protected $hidden = [
        'total_supply',
        'country',
    ];

    public function SupplyID()
    {
        return $this->belongsTo(User::class, 'supply_id', 'id');
    }
}
