<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentInformation extends Model
{
    use HasFactory;

    protected $table = 'student_information';

    public function profile(): BelongsTo
    {
        return $this->belongsTo(
            StudentProfile::class,
            'student_number',
            'student_number'
        );
    }

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
