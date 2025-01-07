<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        // Creazione dei ruoli: Admin, Revisor, Writer
        $roles = ['admin', 'revisor', 'writer'];

        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }

        // Creazione di un utente Admin
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'], // Verifica se esiste già
            [
                'name' => 'Admin User',
                'password' => Hash::make('password123'),
            ]
        );
        $admin->roles()->attach(Role::where('name', 'admin')->first()->id);

        // Creazione di un utente Revisor
        $revisor = User::firstOrCreate(
            ['email' => 'revisor@example.com'],
            [
                'name' => 'Revisor User',
                'password' => Hash::make('password123'),
            ]
        );
        $revisor->roles()->attach(Role::where('name', 'revisor')->first()->id);

        // Creazione di un utente Writer
        $writer = User::firstOrCreate(
            ['email' => 'writer@example.com'],
            [
                'name' => 'Writer User',
                'password' => Hash::make('password123'),
            ]
        );
        $writer->roles()->attach(Role::where('name', 'writer')->first()->id);

        // Creazione di utenti di test
        User::factory(10)->create();
    }
}
