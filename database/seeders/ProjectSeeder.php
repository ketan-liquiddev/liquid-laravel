<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        Project::create([
            'name' => 'Project 1',
            'description' => 'First project description',
            'status' => 'active',
        ]);

        Project::create([
            'name' => 'Project 2',
            'description' => 'Second project description',
            'status' => 'active',
        ]);
    }
}