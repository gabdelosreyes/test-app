<?php

namespace App\Livewire\StudentProfile;

use Livewire\Component;
use App\Models\StudentProfile;

class StudentInformation extends Component
{
    public string $studentNumber;

    public StudentProfile $student;

    protected $listeners = [
        'studentUpdated' => '$refresh',
    ];

    public function mount(string $studentNumber)
    {
        $this->studentNumber = $studentNumber;

        $this->student = StudentProfile::with(['information', 'familyBg', 'guardian', 'educAttainment'])
            ->where('student_number', $studentNumber)
            ->firstOrFail();
    }

    public function render()
    {
        return view('livewire.student-profile.student-information');
    }
}
