<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Training;
class TrainingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['user_id' => 2,'typeExercises' => 'A', 'resumeExercises' => 'Stretching/Leg', 'image' => 'https://via.placeholder.com/150'],
            ['user_id' => 2,'typeExercises' => 'B', 'resumeExercises' => 'Stretching/Back/Trapezius', 'image' => 'https://via.placeholder.com/150'],
            ['user_id' => 2,'typeExercises' => 'C', 'resumeExercises' => 'Stretching/Biceps/Triceps', 'image' => 'https://via.placeholder.com/150'],
            ['user_id' => 2,'typeExercises' => 'D', 'resumeExercises' => 'Stretching/Glutes/Calf/Leg', 'image' => 'https://via.placeholder.com/150'],
            ['user_id' => 2,'typeExercises' => 'E', 'resumeExercises' => 'Stretching/Shoulder/Chest', 'image' => 'https://via.placeholder.com/150'],
        ];

        foreach ($data as $trainingData) {
            Training::create($trainingData);
        }
    }
}
