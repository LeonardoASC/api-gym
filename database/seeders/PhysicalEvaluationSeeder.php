<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PhysicalEvaluation;
use App\Models\User;

class PhysicalEvaluationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $evaluations = [
            [
                'user_email' => 'admin@adm.com',
                'goals' => 'hyperthropy',
                'weight' => 75.5,
                'height' => 1.75,
                'bmi' => null,
                'evaluation_date' => '2024-02-18',
                'evaluator_name' => 'John Doe',
            ],
            [
                'user_email' => 'user@user.com',
                'goals' => 'weight loss',
                'weight' => 65.2,
                'height' => 1.70,
                'bmi' => null,
                'evaluation_date' => '2024-02-18',
                'evaluator_name' => 'Jane Smith',
            ],
        ];

        foreach ($evaluations as $evaluation) {
            // Find user by email
            $user = User::where('email', $evaluation['user_email'])->first();

            if ($user) {
                // Create physical evaluation for the user
                $physicalEvaluation = new PhysicalEvaluation();
                $physicalEvaluation->user_id = $user->id;
                $physicalEvaluation->goals = $evaluation['goals'];
                $physicalEvaluation->weight = $evaluation['weight'];
                $physicalEvaluation->height = $evaluation['height'];
                $physicalEvaluation->bmi = $evaluation['bmi'];
                $physicalEvaluation->evaluation_date = $evaluation['evaluation_date'];
                $physicalEvaluation->evaluator_name = $evaluation['evaluator_name'];
                $physicalEvaluation->save();
            }
        }
    }
}
