<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\StudentEducAttainment;
use App\Models\StudentProfile;


class StudentEducAttainmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StudentProfile::all()->each(function ($student) {

            // Each student gets 1–2 educ attainments
            StudentEducAttainment::factory()
                ->count(rand(1, 2))
                ->create([
                    'student_number' => $student->student_number,
                ]);
        });
    }
}
