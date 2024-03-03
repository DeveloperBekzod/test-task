<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'role_id' => 2,
            'name' => 'Menedjer',
            'email' => 'menedjer@mail.com',
            'password' => Hash::make('12345678'),
        ]);
        for ($i = 1; $i <= 10; $i++) {
            User::create([
                'name' => 'User' . $i,
                'email' => 'user' . $i . '@user',
                'password' => Hash::make('12345678'),
            ]);
        }
    }
}
