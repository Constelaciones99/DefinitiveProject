<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
            'username' => 'miguelito',
            'password' => Hash::make('123456'),
            'mode' => 1,
            'email' => 'miguel@example.com',
            'datec' => now(),
            'country' => 'Argentina',
        ]);
    }
}
