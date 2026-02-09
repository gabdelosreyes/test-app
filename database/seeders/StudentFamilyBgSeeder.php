<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\StudentProfile;
use App\Models\StudentFamilyBg;
use Illuminate\Database\Seeder;


class StudentFamilyBgSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StudentProfile::query()
            ->select('student_number')
            ->each(function ($profile) {

                StudentFamilyBg::factory()->create([
                    'student_number' => $profile->student_number,
                ]);

            });
    }
}
