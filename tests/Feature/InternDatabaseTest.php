<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\Intern;
use App\Models\Professor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InternDatabaseTest extends TestCase
{
    use RefreshDatabase;

    public function test_an_intern_belongs_to_a_professor_managed_by_an_admin(): void
    {
        $admin = Admin::query()->create([
            'name' => 'Admin',
            'email' => 'admin@example.test',
            'password' => 'password',
        ]);

        $professor = Professor::query()->create([
            'admin_id' => $admin->id,
            'first_name' => 'Aya',
            'last_name' => 'Karim',
            'email' => 'aya@example.test',
        ]);

        $intern = Intern::query()->create([
            'professor_id' => $professor->id,
            'first_name' => 'Omar',
            'last_name' => 'Ali',
            'email' => 'omar@example.test',
            'start_date' => '2026-09-01',
        ]);

        $this->assertTrue($intern->professor->is($professor));
        $this->assertTrue($professor->admin->is($admin));
        $this->assertTrue($admin->professors->contains($professor));
    }
}
