<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use Illuminate\Database\Seeder;

class DefaultUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $defaultEmail = 'admin@jambu.app';

        $user = \App\Models\User::where('email', $defaultEmail)->first();

        if (!$user) {
            \App\Models\User::create([
                'name' => 'Admin',
                'email' => $defaultEmail,
                'password' => bcrypt('password'),
                'role' => UserRole::ADMIN->value,
                'email_verified_at' => now(),
            ]);
        }
    }
}
