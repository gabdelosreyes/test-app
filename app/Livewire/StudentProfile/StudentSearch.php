<?php

namespace App\Livewire\StudentProfile;

use Livewire\Component;
use App\Models\StudentInformation;

class StudentSearch extends Component
{
    public $search = '';

    public function render()
    {
        $students = collect();

        if ($this->search !== '') {
            $students = StudentInformation::query()
                ->where('student_number', 'like', "%{$this->search}%")
                ->orderBy('last_name')
                ->get(); // all results, no pagination
        }

        return view('livewire.student-profile.student-search', compact('students'));
    }
}
