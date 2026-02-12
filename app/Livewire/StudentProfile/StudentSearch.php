<?php

namespace App\Livewire\StudentProfile;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\StudentProfile;

class StudentSearch extends Component
{
    // use WithPagination;

    // public $search = '';

    // protected $queryString = [
    //     'search' => ['except' => ''],
    // ];

    // public function updatingSearch()
    // {
    //     $this->resetPage();
    // }

    // public function render()
    // {
    //     $students = StudentProfile::with('information')
    //         ->when($this->search !== '', function ($query) {
    //             $query->where('student_number', 'like', "%{$this->search}%");
    //         })
    //         ->orderBy('program')
    //         ->paginate(10);

    //     return view('livewire.student-profile.student-search', compact('students'));
    // }

    public function render()
    {
        return view('livewire.student-profile.student-search');
    }

}
