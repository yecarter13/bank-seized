<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@autoparts.co.uk',
            'password' => bcrypt('admin123'),
            'is_admin' => true,
        ]);
    }
}
