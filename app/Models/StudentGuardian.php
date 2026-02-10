<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentGuardian extends Model
{
    protected $table = 'student_guardians';

    use HasFactory;

    protected $fillable = [
        'student_number',
        'guardian_name',
        'relationship',
        'guardian_number',
    ];
}
