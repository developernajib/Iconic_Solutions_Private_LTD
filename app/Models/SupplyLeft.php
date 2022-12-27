<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplyLeft extends Model
{
    use HasFactory;

    protected $fillable = [
        'total_supply_left',
        'main_supply',
    ];

    public function SupplyConnection()
    {
        return $this->hasOne(Transaction::class, 'main_supply', 'id');
    }
}
