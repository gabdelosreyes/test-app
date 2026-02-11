<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StudentProfile;

class StudentProfileSeeder extends Seeder
{
    public function run(): void
    {
        StudentProfile::factory()
            ->count(5000)
            ->create();
    }
}
