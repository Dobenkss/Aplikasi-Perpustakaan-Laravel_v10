<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' => bcrypt('adminadmin')
            ],
            [
                'name' => 'abhi',
                'email' => 'abhi@gmail.com',
                'role' => 'anggota',
                'password' => bcrypt('123123')
            ],
        ];

        foreach ($userData as $key => $val) 
        {
            User::create($val);
        }
    }
}
