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
        $statuses = ['Pending', 'In Progress', 'Done'];

        return [
            'project_id' => 1, // This will be overridden in seeder
            'title' => $this->faker->sentence(4),
            'status' => $this->faker->randomElement($statuses),
            'due_date' => optional(
                $this->faker->optional()->dateTimeBetween('+1 day', '+1 month')
            )->format('Y-m-d'),
        ];
    }
}
