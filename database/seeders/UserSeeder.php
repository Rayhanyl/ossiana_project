<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123'),
                'phone' => '+6285282205728',
                'role_id' => 1
            ],
            [
                'name' => 'adzraa fadhilah',
                'email' => 'adzraa@gmail.com',
                'password' => Hash::make('123'),
                'phone' => '+6281351435460',
                'role_id' => 2
            ],
            [
                'name' => 'manager',
                'email' => 'manager@gmail.com',
                'password' => Hash::make('123'),
                'phone' => '+6282112440715',
                'role_id' => 3
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        };
    }
}
