<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition(): array
    {
        return [
            'task' => $this->faker->sentence(),
            'category' => $this->faker->word(),
            'status' => $this->faker->randomDigit(),
            'start_date' => $this->faker->date('Y-m-d', 'now'),
            'end_date' => $this->faker->dateTimeBetween('now', '+2 years'),
            'state' => $this->faker->boolean(35),
        ];
    }
}
