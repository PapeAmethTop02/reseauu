<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Exécuter le seeder.
     *
     * @return void
     */
    public function run()
    {
        // Créer un compte administrateur par défaut
        Employee::create([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'), // Mot de passe par défaut
            'is_approved' => true,
            'role' => 'admin', // Rôle administrateur
        ]);
    }
}