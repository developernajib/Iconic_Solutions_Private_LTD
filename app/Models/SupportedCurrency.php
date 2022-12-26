<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportedCurrency extends Model
{
    use HasFactory;

    protected $hidden = [
        'currency',
        'base_currency',
    ];

    public function users()
    {
        return $this->hasMany('App\Models\User', 'supply_id', 'id');
    }
    public function country()
    {
        return $this->hasMany('App\Models\User', 'country', 'country');
    }
}
