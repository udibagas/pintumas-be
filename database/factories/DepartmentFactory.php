<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Department>
 */
class DepartmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'logo' => fake()->imageUrl(),
            'link' => fake()->url(),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->email(),
            'address' => fake()->address(),
            'facebook' => fake()->url(),
            'instagram' => fake()->url(),
            'youtube' => fake()->url(),
            'linkedin' => fake()->url(),
        ];
    }
}
