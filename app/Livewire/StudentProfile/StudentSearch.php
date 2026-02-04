<?php

namespace App\Livewire\StudentProfile;

use App\Models\StudentInformation;
use Illuminate\Support\Collection;
use Livewire\Component;

class StudentSearch extends Component
{
    public $search = '';
    public $students;

    public function mount()
    {
        $this->students = collect(); 
    }

    public function searchStudent()
    {
        $this->students = StudentInformation::query()
            ->where('student_number', 'like', "%{$this->search}%")
            ->orderBy('last_name')
            ->get(); 
    }

    public function render()
    {
        return view('livewire.student-profile.student-search');
    }
}
