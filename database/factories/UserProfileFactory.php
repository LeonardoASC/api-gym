<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserProfile>
 */
class UserProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->unique()->numberBetween(1, 6),
            'phone' => $this->faker->phoneNumber,
            'cpf' => $this->faker->regexify('[0-9]{3}\.[0-9]{3}\.[0-9]{3}-[0-9]{2}'),
            'birth_date' => $this->faker->date,
            'image' => $this->faker->imageUrl(),
            'is_active_member' => $this->faker->boolean,
            'start_date' => $this->faker->date,
            'end_date' => $this->faker->date,
        ];
    }
}
