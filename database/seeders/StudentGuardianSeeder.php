<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\StudentProfile;
use App\Models\StudentGuardian;

class StudentGuardianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StudentProfile::all()->each(function ($student) {

            // Each student gets 1–3 guardians
            StudentGuardian::factory()
                ->count(rand(1, 2))
                ->create([
                    'student_number' => $student->student_number,
                ]);
        });
    }
}
