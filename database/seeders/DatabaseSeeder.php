<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\Admin;
use App\Models\TotalSupply;
use App\Models\SupportedCurrency;
use App\Models\User;
use App\Models\Transaction;
use App\Models\Wallet;
use App\Models\SupplyLeft;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Admin::factory(1)->create();
        User::factory(10)->create();
        TotalSupply::factory(1)->create();
        SupportedCurrency::factory(1)->create();
        Wallet::factory(1)->create();
        SupplyLeft::factory(1)->create();

        User::factory()->create([
            'name' => 'Md. Najib Islam',
            'email' => 'user@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make("123456789"), // 123456789
            'country' => 'Bangladesh',
            'wallet_id' => 1,
            'remember_token' => Str::random(10),
            'status' => 1,
        ]);
        User::factory()->create([
            'name' => 'Tawsif Tamim',
            'email' => 'user2@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make("123456789"), // 123456789
            'country' => 'USA',
            'wallet_id' => 2,
            'remember_token' => Str::random(10),
            'status' => 1,
        ]);
        Transaction::factory()->create([
            'from' => 'admin@gmail.com',
            'to' => 'user@gmail.com',
            'amount' => 10000,
            'status' => 1,
        ]);
        Transaction::factory()->create([
            'from' => 'admin@gmail.com',
            'to' => 'user2@gmail.com',
            'amount' => 10000,
            'status' => 1,
        ]);

        Transaction::factory(1)->create();

        Wallet::factory()->create([
            'user_id' => 12,
            'email' => 'user2@gmail.com',
            'amount' => 10100,
            'supply_id' => 1,
        ]);
        SupportedCurrency::factory()->create([
            'country' => 'Bangladesh',
            'currency' => 'BDT',
            'created_at' => Carbon::now(),
        ]);
        SupportedCurrency::factory()->create([
            'country' => 'Europe',
            'currency' => 'EUR',
            'created_at' => Carbon::now(),
        ]);
    }
}
