<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TrainingLog>
 */
class TrainingLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'training_id' => $this->faker->numberBetween(1, 5),
            'user_id' => $this->faker->numberBetween(1, 4),
            'started_at' => $this->faker->dateTimeThisYear(),
            'finished_at' => $this->faker->dateTimeThisYear(),
            'duration_minutes' => $this->faker->numberBetween(10, 120),
            'notes' => $this->faker->text(),
        ];
    }
}
