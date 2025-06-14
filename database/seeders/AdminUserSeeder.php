<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Laratrust\Models\Role; // Assure-toi que c'est bien celui-ci ou ton propre modèle
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // Création ou mise à jour de l'utilisateur admin
        $admin = User::updateOrCreate(
            ['email' => 'rincedonfack5@gmail.com'],
            [
                'name' => 'Admin',
                'phone' => '651673144',
                'password' => Hash::make('admin'),
                'statut' => true,
            ]
        );

        // Récupération des rôles existants (assure-toi que la table 'roles' est déjà seedée)
        $roles = Role::all()->pluck('name')->toArray();

        // Assignation de tous les rôles à l'admin
        $admin->syncRoles($roles);

        $this->command->info("Admin user has been assigned all roles.");
    }
}
