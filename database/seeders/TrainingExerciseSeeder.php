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
                'train_id' => 1,
                'name' => 'Bench Press',
                'sets' => 3,
                'reps' => '8-10',
                'weight' => 100,
                'image' => 'https://www.elhombre.com.br/wp-content/uploads/2022/08/image.png',
            ],
            [
                'train_id' => 1,
                'name' => 'Squats',
                'sets' => 4,
                'reps' => '10-12',
                'weight' => 150,
                'image' => 'https://i.pinimg.com/736x/a7/e6/20/a7e6209d4ca7fdbb2f44e565bc93910b.jpg',
            ],
            [
                'train_id' => 2,
                'name' => 'Deadlift',
                'sets' => 3,
                'reps' => '8-10',
                'weight' => 120,
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/5/59/Crossover-with-bands-2.png',
            ],
            [
                'train_id' => 2,
                'name' => 'Pull-ups',
                'sets' => 3,
                'reps' => '8-10',
                'weight' => 0,
                'image' => 'https://i.pinimg.com/474x/48/20/1c/48201cb5f7e13121054517991e129199.jpg',
            ],
            [
                'train_id' => 3,
                'name' => 'Underhand Pull-downs',
                'sets' => 3,
                'reps' => '8-10',
                'weight' => 40,
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/e/e5/Underhand-pull-downs-2.png',
            ],
            [
                'train_id' => 3,
                'name' => 'Dumbbell Bicep Curl',
                'sets' => 3,
                'reps' => '8-10',
                'weight' => 30,
                'image' => 'https://pt-static.z-dn.net/files/d91/7809b00a1f18014beb188e4da320d6c8.png',
            ],
        ];

        // Inserir os dados na tabela training_exercises
        foreach ($exercises as $exercise) {
            TrainingExercise::create($exercise);
        }
    }
}
