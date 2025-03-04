<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(GymSeeder::class);
        $this->call(AdminUserSeeder::class);
        $this->call(TrainingSeeder::class);
        $this->call(PhysicalEvaluationSeeder::class);
        $this->call(TrainingExerciseSeeder::class);
        $this->call(PaymentSeeder::class);
        $this->call(FrequenceSeeder::class);
        $this->call(NutritionSeeder::class);
        $this->call(TrainingLogSeeder::class);
        $this->call(UserProfileSeeder::class);
    }
}
