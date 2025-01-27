<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Administrador',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'role_id' => 1,
        ]);

        $client = User::create([
            'name' => 'Usuário',
            'email' => 'user@user.com',
            'password' => bcrypt('password'),
            'role_id' => 4,
        ]);
    }
}
