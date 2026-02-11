<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\StudentEducAttainment;
use App\Models\StudentProfile;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StudentEducAttainment>
 */
class StudentEducAttainmentFactory extends Factory
{
    protected $model = StudentEducAttainment::class;
    
    public function definition(): array
    {
        $levels = [
            'Primary',
            'Secondary',
            'Vocational',
            'College',
            'Graduate Studies'
        ];

        $level = $this->faker->randomElement($levels);

        $degree = null;
        $field = null;

        if (in_array($level, ['College', 'Graduate Studies'])) {
            $degree = $this->faker->randomElement(['Bachelor of Science', 'Bachelor of Arts', 'Master of Science', 'Master of Arts', 'Diploma']);
            $field  = $this->faker->randomElement(['Computer Science', 'Education', 'Engineering', 'Business Administration', 'Nursing']);
        }

        if (in_array($level, ['Vocational'])) {
            $degree = $this->faker->randomElement(['STEM', 'TVL', 'ABM']);
        }

        $startYear = $this->faker->numberBetween(2000, 2018);
        $endYear   = $startYear + $this->faker->numberBetween(3, 5);
        $yearGraduated   = $endYear + $this->faker->numberBetween(1, 3);

        return [
            'student_number'    => StudentProfile::inRandomOrder()->value('student_number'), // link to existing students
            'educational_level' => $level,
            'degree'            => $degree,
            'field_of_study'    => $field,
            'school_name'       => $this->faker->company . ' School',
            'school_address'    => $this->faker->address,
            'status'            => $this->faker->randomElement(['Completed', 'Ongoing', 'Dropped']),
            'year_started'      => $startYear,
            'year_ended'        => $endYear,
            'year_graduated'    => $yearGraduated,
            'honors'            => $this->faker->boolean(30) ? $this->faker->randomElement(['Cum Laude', 'Magna Cum Laude', 'Summa Cum Laude']) : null,
        ];
    }
}

