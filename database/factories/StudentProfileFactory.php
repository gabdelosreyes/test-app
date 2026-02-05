<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StudentProfile>
 */
class StudentProfileFactory extends Factory
{
    public function definition(): array
    {
        $yearAdmitted = $this->faker->numberBetween(2024, 2026);

        return [
            'student_number' => $this->faker->unique()->numerify('20261####'),

            'program' => $this->faker->randomElement([
                'BSIT',
                'BSCS',
                'BSBA',
                'BSEDUC',
                'BSHM',
            ]),

            'major' => $this->faker->optional()->randomElement([
                'Software Engineering',
                'Network Administration',
                'Data Science',
                'Marketing',
            ]),

            'year_level' => $this->faker->numberBetween(1, 4),

            'semester' => $this->faker->randomElement([
                'FIRST',
                'SECOND',
                'SUMMER',
            ]),

            'academic_year' => $yearAdmitted . '-' . ($yearAdmitted + 1),

            'student_type' => $this->faker->randomElement([
                'UG',   // Undergraduate
                'G',    // Graduate
                'PRO',  // Professional
            ]),

            'status' => $this->faker->randomElement([
                'REG',
                'IREG',
                'LOA',
            ]),

            'year_admitted' => $yearAdmitted,

            'sem_admitted' => $this->faker->randomElement([
                'FIRST',
                'SECOND',
                'SUMMER',
            ]),
        ];
    }
}
