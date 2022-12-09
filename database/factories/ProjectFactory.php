<?php

namespace Database\Factories;

use App\Enums\ProjectStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    public function definition(): array
    {
        $totalAmount = round($this->faker->numberBetween(100000, 500000), -3);

        return [
            'user_id' => fake()->numberBetween(1, 10),
            'name' => fake()->company(),
            'location' => fake()->city(),
            'description' => fake()->text(255),
            'own_contribution' => $totalAmount * config('crowdfunding.contributions.own'),
            'external_contribution' => $totalAmount * config('crowdfunding.contributions.external'),
            'crowdfunding_contribution' => $totalAmount * config('crowdfunding.contributions.crowdfunding'),
            'iban' => fake()->iban(),
            'iban_name' => fake()->name(),
            'status' => fake()->randomElement([ProjectStatus::Pending->name, ProjectStatus::Active->name, ProjectStatus::Cancelled->name]),
            'interest_rate' => config('crowdfunding.interest'),
            'duration' => config('crowdfunding.duration'),
        ];
    }
}
