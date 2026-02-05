<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StudentInformation>
 */
class StudentInformationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_number' => $this->faker->unique()->numerify('20261####'),

            'first_name'  => $this->faker->firstName,
            'middle_name' => $this->faker->boolean(70) ? $this->faker->lastName : null,
            'last_name'   => $this->faker->lastName,
            'suffix'      => $this->faker->randomElement([null, 'Jr.', 'Sr.', 'III']),

            'province'     => $this->faker->state,
            'municipality' => $this->faker->city,
            'brgy'         => 'Brgy. ' . $this->faker->streetName,
            'street'       => $this->faker->boolean(70) ? $this->faker->streetAddress : null,

            'birth_date' => $this->faker->dateTimeBetween('-25 years', '-17 years')->format('Y-m-d'),

            'religion' => $this->faker->randomElement([
                'Roman Catholic',
                'Christian',
                'Islam',
                'Iglesia ni Cristo',
                null
            ]),

            'citizenship' => $this->faker->randomElement([
                'Filipino',
                'Dual Citizen'
            ]),

            'marital_status' => $this->faker->randomElement([
                'Single',
                'Married',
                null
            ]),

            'guardian_name' => $this->faker->boolean(80)
                ? $this->faker->name
                : null,

            'guardian_number' => $this->faker->boolean(80)
                ? $this->faker->numerify('09#########')
                : null,

            'course_code' => $this->faker->randomElement([
                'BSIT',
                'BSCS',
                'BSECE',
                'BSBA',
                'BSED'
            ]),

            'high_school' => $this->faker->boolean(80)
                ? $this->faker->company . ' High School'
                : null,

            'year_admitted' => $this->faker->numberBetween(2010, 2026),

            'sem_admitted' => $this->faker->randomElement(['FIRST', 'SECOND', 'SUMMER']),
        ];
    }
}
