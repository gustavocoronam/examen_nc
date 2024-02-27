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
        return [
            'name' => 'task ' . fake()->numberBetween(1, 4),
            'description' => 'task content',
            'is_completed' => fake()->boolean(),
            'company_id' => fake()->numberBetween(1, 2),
            'user_id' => fake()->numberBetween(1, 2),
        ];
    }
}
