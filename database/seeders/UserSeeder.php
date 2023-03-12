<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Hardik',
            'email' => 'hardik@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        User::create([
            'name' => 'Rahim',
            'email' => 'rahim@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        User::create([
            'name' => 'Sadman',
            'email' => 'sadman@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        User::create([
            'name' => 'Sakib',
            'email' => 'sakib@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        User::create([
            'name' => 'Taskin',
            'email' => 'taskin@gmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
