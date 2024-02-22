<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Frequence;

class FrequenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $frequencies = [
            [
                'user_id' => 1,
                'date' => now()->toDateString(),
                'present' => true,
                'entry_time' => '08:00:00',
            ],
            [
                'user_id' => 1,
                'date' => now()->subDay()->toDateString(),
                'present' => false,
                'entry_time' => null,
            ],
            [
                'user_id' => 1,
                'date' => now()->subDays(2)->toDateString(),
                'present' => true,
                'entry_time' => '07:30:00',
            ],
            [
                'user_id' => 1,
                'date' => now()->subDays(3)->toDateString(),
                'present' => true,
                'entry_time' => '09:15:00',
            ],
            [
                'user_id' => 1,
                'date' => now()->subDays(4)->toDateString(),
                'present' => true,
                'entry_time' => '08:45:00',
            ],
            [
                'user_id' => 1,
                'date' => now()->subDays(5)->toDateString(),
                'present' => false,
                'entry_time' => null,
            ],
            [
                'user_id' => 1,
                'date' => now()->subDays(6)->toDateString(),
                'present' => true,
                'entry_time' => '10:00:00',
            ],
        ];

        // Insere as frequências na tabela
        foreach ($frequencies as $frequence) {
            Frequence::create($frequence);
        }
    }
}
