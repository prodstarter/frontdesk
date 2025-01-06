<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Frontdesk Admin',
            'email' => 'admin@frontdesk.test',
            'password' => bcrypt('12345678'),
            'email_verified_at' => now(),
            'is_admin' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
     
    }
}
