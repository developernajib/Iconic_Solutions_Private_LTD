<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'from',
        'to',
        'amount',
    ];

    public function users()
    {
        return $this->hasMany('App\Models\User', 'role_id', 'id');
    }
}
