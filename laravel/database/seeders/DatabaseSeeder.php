<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $admin_role     = Role::firstOrCreate(['name' => 'admin', 'label' => 'Administrador']);
        $student_role   = Role::firstOrCreate(['name' => 'student', 'label' => 'Aluno']);
        $professor_role = Role::firstOrCreate(['name' => 'professor', 'label' => 'Professor']);

        $admin = User::factory()->create([
            'name' => 'Mateus',
            'email' => 'mateus.alecrin@hotmail.com',
            'password' => bcrypt('784892'),
        ]);

        $admin->roles()->attach($admin_role->id);
    }
}
