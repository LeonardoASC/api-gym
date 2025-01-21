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
            'name' => $this->faker->words(3, true), // Nome da receita com 3 palavras
            'description' => $this->faker->sentence, // Frase curta como descrição
            'ingredients' => $this->faker->words(5, true), // Lista curta de ingredientes
            'prepTime' => $this->faker->numberBetween(5, 60) . ' minutes', // Tempo de preparo em minutos
            'mealType' => $this->faker->randomElement(['Breakfast', 'Lunch', 'Dinner', 'Snack']), // Tipo de refeição
            'recipe' => $this->faker->paragraph, // Descrição detalhada da receita
            'difficulty' => $this->faker->randomElement(['Easy', 'Medium', 'Hard']), // Nível de dificuldade
            'benefits' => $this->faker->sentence, // Frase curta descrevendo os benefícios
            'servingSize' => $this->faker->randomDigitNotNull . ' servings', // Porções
            'image' => $this->faker->imageUrl(640, 480, 'food', true), // URL de imagem
        ];
    }
}
