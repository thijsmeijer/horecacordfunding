<?php

namespace Database\Factories;

use App\Enums\ProjectStatus;
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
        $totalAmount = round($this->faker->numberBetween(100000, 500000), -3);

        return [
            'user_id' => fake()->numberBetween(1, 10),
            'name' => fake()->company(),
            'location' => fake()->city(),
            'description' => fake()->text(255),
            'own_contribution' => $totalAmount * 0.1,
            'external_contribution' => $totalAmount * 0.3,
            'crowdfunding_contribution' => $totalAmount * 0.6,
            'interest_rate' => fake()->numberBetween(5, 10),
            'iban' => fake()->iban(),
            'iban_name' => fake()->name(),
            'duration' => fake()->randomElement([12, 24, 36, 48, 60]),
            'status' => fake()->randomElement(ProjectStatus::getValues()),
        ];
    }
}
