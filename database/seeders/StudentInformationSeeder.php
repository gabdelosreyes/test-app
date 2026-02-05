<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StudentProfile;
use App\Models\StudentInformation;

class StudentInformationSeeder extends Seeder
{
    public function run(): void
    {
        StudentProfile::query()
            ->select('student_number')
            ->each(function ($profile) {

                StudentInformation::factory()->create([
                    'student_number' => $profile->student_number,
                ]);

            });
    }
}
