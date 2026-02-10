<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\StudentProfile;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StudentGuardian>
 */
class StudentGuardianFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Will be overridden in seeder
            'student_number' => null,

            'guardian_name' => $this->faker->name,
            'relationship' => $this->faker->randomElement([
                'Father',
                'Mother',
                'Brother',
                'Grandparent',
                'Sister',
                'Aunt',
                'Uncle',
                'Others',
            ]),
            'guardian_number' => $this->faker->numerify('09#########'),
        ];
    }
}
