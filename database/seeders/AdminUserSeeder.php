<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'arafatpstu7@gmail.com',
            'is_admin' => true,
            'password' => Hash::make('01905167467@?aR'),
            'email_verified_at' => now(),
        ]);
    }
}
