<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Administrador',
                'email' => 'admin@adm.com',
                'password' => bcrypt('123123123'),
                'role' => 'admin',
                'gym_id' => null
            ],
            [
                'name' => 'Usuario',
                'email' => 'user@user.com',
                'password' => bcrypt('123123123'),
                'role' => 'user',
                'gym_id' => 1
            ],
            [
                'name' => 'Administrador',
                'email' => 'admin2@adm.com',
                'password' => bcrypt('123123123'),
                'role' => 'admin',
                'gym_id' => null
            ],
            [
                'name' => 'Usuario2',
                'email' => 'user2@user.com',
                'password' => bcrypt('123123123'),
                'role' => 'user',
                'gym_id' => 2
            ],
            [
                'name' => 'Administrador',
                'email' => 'admin3@adm.com',
                'password' => bcrypt('123123123'),
                'role' => 'admin',
                'gym_id' => null
            ],
            [
                'name' => 'Usuario3',
                'email' => 'user3@user.com',
                'password' => bcrypt('123123123'),
                'role' => 'user',
                'gym_id' => 3
            ],

        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
