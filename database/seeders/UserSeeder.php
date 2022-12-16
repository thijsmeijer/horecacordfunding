<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.org',
            'password' => '$2y$10$eRBjpJthcJpx5/J0P24NtOcMAJ1NeRPWJuLa.yyBDsV7wkLTF0aHC', // secret
        ]);
    }
}
