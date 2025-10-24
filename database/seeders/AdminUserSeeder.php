<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'], // kunci unik untuk cek duplikat
            [
                'name' => 'Admin',             // bisa tambahkan nama
                'password' => bcrypt('password'),
                'is_admin' => true,
            ]
        );
    }
}
