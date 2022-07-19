<?php

namespace Database\Seeders;

use App\Models\Program;
use App\Models\Student;
use App\Models\ProgramType;
use App\Models\ProgramRunType;
use Illuminate\Database\Seeder;
use Database\Factories\ProgramFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Student::factory(5)->create();
        ProgramRunType::factory(3)->create();
        ProgramType::factory(3)->create();
        Program::factory(5)->create();
    }
}
