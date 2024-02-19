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
            ['amountExercises' => 6, 'typeExercises' => 'A', 'resumeExercises' => 'Stretching/Leg'],
            ['amountExercises' => 7, 'typeExercises' => 'B', 'resumeExercises' => 'Stretching/Back/Trapezius'],
            ['amountExercises' => 8, 'typeExercises' => 'C', 'resumeExercises' => 'Stretching/Biceps/Triceps'],
            ['amountExercises' => 9, 'typeExercises' => 'D', 'resumeExercises' => 'Stretching/Glutes/Calf/Leg'],
            ['amountExercises' => 9, 'typeExercises' => 'E', 'resumeExercises' => 'Stretching/Shoulder/Chest'],
        ];

        foreach ($data as $trainingData) {
            Training::create($trainingData);
        }
    }
}
