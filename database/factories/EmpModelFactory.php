<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EmpModel>
 */
class EmpModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'eid' => fake(),
            'address' => fake()->address(),
            'gender' => fake()->randomElement(['male', 'female']),
            'dob' => fake()->date(),
        ];
    }
}
