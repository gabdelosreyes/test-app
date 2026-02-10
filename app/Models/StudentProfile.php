<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StudentProfile extends Model
{
    use HasFactory;
    
    protected $table = 'student_profiles';

    public function information(): HasOne
    {
        return $this->hasOne(
            StudentInformation::class,
            'student_number',   // FK on student_information
            'student_number'    // PK on student_profiles
        );
    }

    public function familyBg(): HasOne
    {
        return $this->hasOne(
            StudentFamilyBg::class,
            'student_number',
            'student_number'
        );
    }

    public function guardian(): HasMany
    {
        return $this->hasMany(
            StudentGuardian::class,
            'student_number',
            'student_number'
        );
    }

    public function educAttainment(): HasMany
    {
        return $this->hasMany(
            StudentEducAttainment::class,
            'student_number',
            'student_number'
        );
    }

    protected $fillable = [
        'student_number',
        'program',
        'major',
        'year_level',
        'semester',
        'academic_year',
        'student_type',
        'status',
        'year_admitted',
        'sem_admitted',
    ];
}
