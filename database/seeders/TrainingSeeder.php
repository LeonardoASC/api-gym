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
            ['id' => '1', 'amountExercises' => 6, 'typeExercises' => 'A', 'resumeExercises' => 'Stretching/Leg'],
            ['id' => '2', 'amountExercises' => 7, 'typeExercises' => 'B', 'resumeExercises' => 'Stretching/Back/Trapezius'],
            ['id' => '3', 'amountExercises' => 8, 'typeExercises' => 'C', 'resumeExercises' => 'Stretching/Biceps/Triceps'],
            ['id' => '4', 'amountExercises' => 9, 'typeExercises' => 'D', 'resumeExercises' => 'Stretching/Glutes/Calf/Leg'],
            ['id' => '5', 'amountExercises' => 9, 'typeExercises' => 'E', 'resumeExercises' => 'Stretching/Shoulder/Chest'],
        ];

        foreach ($data as $trainingData) {
            Training::create($trainingData);
        }
    }
}
