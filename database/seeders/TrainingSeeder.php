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
            ['user_id' => 2,'typeExercises' => 'A', 'resumeExercises' => 'Stretching/Leg', 'image' => ''],
            ['user_id' => 2,'typeExercises' => 'B', 'resumeExercises' => 'Stretching/Back/Trapezius', 'image' => ''],
            ['user_id' => 2,'typeExercises' => 'C', 'resumeExercises' => 'Stretching/Biceps/Triceps', 'image' => ''],
            ['user_id' => 2,'typeExercises' => 'D', 'resumeExercises' => 'Stretching/Glutes/Calf/Leg', 'image' => ''],
            ['user_id' => 2,'typeExercises' => 'E', 'resumeExercises' => 'Stretching/Shoulder/Chest', 'image' => ''],
        ];

        foreach ($data as $trainingData) {
            Training::create($trainingData);
        }
    }
}
