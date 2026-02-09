<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StudentFamilyBg>
 */
class StudentFamilyBgFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // pick an existing student_number
            'student_number' => null,

            'father_name' => $this->faker->name('male'),
            'father_occupation' => $this->faker->jobTitle(),

            'mother_name' => $this->faker->name('female'),
            'mother_occupation' => $this->faker->jobTitle(),
        ];
    }
}
