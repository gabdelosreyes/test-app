<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class StudentFamilyBg extends Model
{
    use HasFactory;

    protected $table = 'student_family_bgs';

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
        'father_name',
        'father_occupation',
        'mother_name',
        'mother_occupation',
    ];
}
