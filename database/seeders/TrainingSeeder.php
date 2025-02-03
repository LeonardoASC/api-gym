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
            ['user_id' => 2,'amountExercises' => 6, 'typeExercises' => 'A', 'resumeExercises' => 'Stretching/Leg'],
            ['user_id' => 2,'amountExercises' => 7, 'typeExercises' => 'B', 'resumeExercises' => 'Stretching/Back/Trapezius'],
            ['user_id' => 2,'amountExercises' => 8, 'typeExercises' => 'C', 'resumeExercises' => 'Stretching/Biceps/Triceps'],
            ['user_id' => 2,'amountExercises' => 9, 'typeExercises' => 'D', 'resumeExercises' => 'Stretching/Glutes/Calf/Leg'],
            ['user_id' => 2,'amountExercises' => 9, 'typeExercises' => 'E', 'resumeExercises' => 'Stretching/Shoulder/Chest'],
        ];

        foreach ($data as $trainingData) {
            Training::create($trainingData);
        }
    }
}
