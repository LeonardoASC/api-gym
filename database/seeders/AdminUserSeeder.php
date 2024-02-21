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
                'phone' => '123-456-7890',
                'address' => '123 Main St',
                'neighborhood' => 'Downtown',
                'zip_cod' => '12345',
                'city' => 'Cityville',
                'state' => 'ST',
                'birth' => '1990-01-01',
                'cpf' => '123.456.789-00',
                'registration' => 'A12345',
            ],
            [
                'name' => 'Usuario',
                'email' => 'user@user.com',
                'password' => bcrypt('123123123'),
                'phone' => '987-654-3210',
                'address' => '456 Elm St',
                'neighborhood' => 'Uptown',
                'zip_cod' => '54321',
                'city' => 'Towndale',
                'state' => 'TS',
                'birth' => '1985-05-05',
                'cpf' => '987.654.321-00',
                'registration' => 'B54321',
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
