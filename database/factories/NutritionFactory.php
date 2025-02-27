<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Nutrition>
 */
class NutritionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 4), // ID do usuário
            'mealName' => $this->faker->words(3, true), // Nome da receita com 3 palavras
            'description' => $this->faker->sentence, // Frase curta como descrição
            'mealTime' => $this->faker->numberBetween(0, 23) . ':00',
            'ingredients' => $this->faker->words(5, true), // Lista curta de ingredientes
            'prepTime' => $this->faker->numberBetween(5, 60) . ' minutes', // Tempo de preparo em minutos
            'mealType' => $this->faker->randomElement(['Breakfast', 'Lunch', 'Dinner', 'Snack']), // Tipo de refeição
            'recipe' => $this->faker->words(10, true), 
            'difficulty' => $this->faker->randomElement(['Easy', 'Medium', 'Hard']), // Nível de dificuldade
            'benefits' => $this->faker->sentence, // Frase curta descrevendo os benefícios
            'portionSize' => $this->faker->randomDigitNotNull . ' servings', // Porções
            'image' => '', 
        ];
    }
}
