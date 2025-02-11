<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TrainingExercise;

class TrainingExerciseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $exercises = [
            [
                'training_id' => 1,
                'name' => 'Bench Press',
                'sets' => 3,
                'reps' => '8-10',
                'weight' => 100,
                'image' => '',
            ],
            [
                'training_id' => 1,
                'name' => 'Squats',
                'sets' => 4,
                'reps' => '10-12',
                'weight' => 150,
                'image' => '',
            ],
            [
                'training_id' => 2,
                'name' => 'Deadlift',
                'sets' => 3,
                'reps' => '8-10',
                'weight' => 120,
                'image' => '',
            ],
            [
                'training_id' => 2,
                'name' => 'Pull-ups',
                'sets' => 3,
                'reps' => '8-10',
                'weight' => 0,
                'image' => '',
            ],
            [
                'training_id' => 3,
                'name' => 'Underhand Pull-downs',
                'sets' => 3,
                'reps' => '8-10',
                'weight' => 40,
                'image' => '',
            ],
            [
                'training_id' => 3,
                'name' => 'Dumbbell Bicep Curl',
                'sets' => 3,
                'reps' => '8-10',
                'weight' => 30,
                'image' => '',
            ],
        ];

        // Inserir os dados na tabela training_exercises
        foreach ($exercises as $exercise) {
            TrainingExercise::create($exercise);
        }
    }
}
