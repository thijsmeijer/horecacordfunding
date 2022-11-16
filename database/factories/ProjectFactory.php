<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => fake()->numberBetween(1, 10),
            'name' => fake()->company(),
            'location' => fake()->city(),
            'description' => fake()->text(255),
            'amount' => round(fake()->numberBetween(20000, 100000), -2),
            'interest_rate' => fake()->numberBetween(5, 10),
            'status' => fake()->randomElement(['private', 'public']),
            'iban' => fake()->iban(),
            'iban_name' => fake()->name(),
            'duration' => fake()->randomElement([12, 24, 36, 48, 60]),
        ];
    }
}
