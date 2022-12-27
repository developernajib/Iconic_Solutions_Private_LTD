<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Wallet;
use App\Models\SupplyLeft;
use App\Models\SupportedCurrency;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function WalletId()
    {
        return $this->belongsTo(Wallet::class, 'wallet_id', 'id');
    }

    public function CountryId()
    {
        return $this->belongsTo(SupportedCurrency::class, 'country', 'country');
    }

    public function TransactionId()
    {
        return $this->belongsTo(Transaction::class, 'email', 'from');
    }

    public function SupplyId()
    {
        return $this->belongsTo(SupplyLeft::class, 'main_supply', 'id');
    }
}
