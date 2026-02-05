<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentFamilyBg extends Model
{
    protected $table = 'student_family_bgs';

    protected $fillable = [
        'student_number',
        'father_name',
        'father_occupation',
        'mother_name',
        'mother_occupation',
    ];
}
