<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Intern;
use App\Models\Professor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = Admin::query()->updateOrCreate(
            ['email' => 'admin@gestion-stagiaires.test'],
            ['name' => 'System Administrator', 'password' => 'password']
        );

        $professor = Professor::query()->updateOrCreate(
            ['email' => 'professor@gestion-stagiaires.test'],
            [
                'admin_id' => $admin->id,
                'first_name' => 'Amine',
                'last_name' => 'Bennani',
                'phone' => '+212600000000',
            ]
        );

        Intern::query()->updateOrCreate(
            ['email' => 'intern@gestion-stagiaires.test'],
            [
                'professor_id' => $professor->id,
                'first_name' => 'Sara',
                'last_name' => 'El Mansouri',
                'phone' => '+212611111111',
                'start_date' => '2026-09-01',
                'end_date' => '2026-12-31',
            ]
        );
    }
}
