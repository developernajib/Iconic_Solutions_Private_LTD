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
        SupportedCurrency::factory(3)->create();
        Wallet::factory(1)->create();
        Transaction::factory(1)->create();

        User::factory()->create([
            'name' => 'Md. Najib Islam',
            'email' => 'user@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make("123456789"), // 123456789
            'remember_token' => Str::random(10),
            'status' => 1,
        ]);
        User::factory()->create([
            'name' => 'Tawsif Tamim',
            'email' => 'user2@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make("123456789"), // 123456789
            'remember_token' => Str::random(10),
            'status' => 1,
        ]);
        Wallet::factory()->create([
            'user_id' => 12,
            'email' => 'user2@gmail.com',
            'amount' => 1000,
            'supply_id' => 1,
        ]);
    }
}
