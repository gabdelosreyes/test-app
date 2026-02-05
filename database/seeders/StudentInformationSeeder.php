<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\StudentInformation;
use Illuminate\Database\Seeder;

class StudentInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StudentInformation::truncate();

        StudentInformation::factory()
            ->count(5000) 
            ->create();
    }
}
