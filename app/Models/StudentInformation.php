<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentInformation extends Model
{
    use HasFactory;

    protected $table = 'student_information';
    

    protected $fillable = [
        'student_number',
        'first_name',
        'middle_name',
        'last_name',
        'suffix',
        'province',
        'municipality',
        'brgy',
        'street',
        'birth_date',
        'religion',
        'citizenship',
        'marital_status',
        'guardian_name',
        'guardian_number',
        'course_code',
        'high_school',
        'year_admitted',
        'sem_admitted',
    ];
}
