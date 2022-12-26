<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'email',
        'amount',
    ];

    public function WalletConnection()
    {
        return $this->hasOne(User::class, 'wallet_id', 'id');
    }

    public function TotalSupply()
    {
        return $this->hasOne(TotalSupply::class, 'supply_id', 'id');
    }
}
