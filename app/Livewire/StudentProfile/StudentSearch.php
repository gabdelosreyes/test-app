<?php

namespace App\Livewire\StudentProfile;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\StudentProfile;

class StudentSearch extends Component
{
    public function render()
    {
        return view('livewire.student-profile.student-search');
    }
}
