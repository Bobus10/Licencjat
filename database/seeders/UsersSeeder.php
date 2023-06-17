<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
        ['first_name' => 'admin',
        'last_name' => 'admin',
        'phone_number' => '123456789',
        'email' => 'admin@gmail.com',
        'password' => Hash::make('qwer1234'),
        'role' => 'admin'],
        ['first_name' => 'user',
        'last_name' => 'user',
        'phone_number' => '123456789',
        'email' => 'user@gmail.com',
        'password' => Hash::make('qwer1234'),
        'role' => 'user'],
        ];
        User::insert($data);
    }
}
