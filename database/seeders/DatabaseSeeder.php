<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Buat admin user
        $this->call(AdminUserSeeder::class);

        // Buat user biasa (bisa buat testing)
        User::updateOrCreate(
            ['email' => 'user@gmail.com'],
            [
                'name' => 'User',
                'password' => bcrypt('password'),
                'is_admin' => false,
            ]
        );
    }
}
