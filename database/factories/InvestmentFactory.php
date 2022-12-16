<?php

namespace Database\Factories;

use App\Enums\InvestmentStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Investment>
 */
class InvestmentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'amount' => round(fake()->numberBetween(1000, 2000), -2),
            'status' => InvestmentStatus::Accepted->value,
            'iban' => fake()->iban('NL'),
            'iban_name' => fake()->name(),
        ];
    }
}
