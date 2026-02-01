<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if user exists using database facade to be safe
        $exists = DB::table('users')->where('email', 'admin@hospital.com')->exists();

        if (!$exists) {
            User::create([
                'name' => 'Administrador',
                'email' => 'admin@hospital.com',
                'password' => Hash::make('password'),
            ]);
            $this->command->info('Usuario Administrador creado exitosamente.');
            $this->command->info('Email: admin@hospital.com');
            $this->command->info('Password: password');
        } else {
            $this->command->info('El usuario administrador ya existe.');
        }
    }
}
