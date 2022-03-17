<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition(): array
    {
        return [
            'task' => $this->faker->sentence(),
            'category' => $this->faker->randomElements(['Home', 'School', 'Health', 'Leisure'], 1, true),
            'status' => $this->faker->randomElements([0, 1, 2, 3, 4, 5, 6], 1, true),
            'start_date' => $this->faker->date('Y-m-d', 'now'),
            'end_date' => $this->faker->dateTimeBetween('now', '+2 years'),
            'state' => $this->faker->boolean(35),
        ];
    }
}
