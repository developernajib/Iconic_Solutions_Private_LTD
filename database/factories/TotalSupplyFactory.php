<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TotalSupply>
 */
class TotalSupplyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'total_supply' => "1000000",
            'base_currency' => 'USD',
            'created_at' => Carbon::now(),
        ];
    }
}
