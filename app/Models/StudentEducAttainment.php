<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentEducAttainment extends Model
{
    use HasFactory;

    protected $table = 'student_educ_attainments';

    protected $fillable = [
        'student_number',
        'educational_level',
        'degree',
        'field_of_study',
        'school_name',
        'school_address',
        'status',
        'year_started',
        'year_ended',
        'year_graduated',
        'honors',
    ];
}
