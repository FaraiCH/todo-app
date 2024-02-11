<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Use Faker to create dummy data for Tasks
        return [
            'title' => fake()->title(),
            'description' => fake()->paragraph,
            'long_description' => fake()->paragraph(4, true),
            'completed' => fake()->boolean
        ];
    }
}
