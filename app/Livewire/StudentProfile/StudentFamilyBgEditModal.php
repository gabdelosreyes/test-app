<?php

namespace App\Livewire\StudentProfile;

use Livewire\Component;
use App\Models\StudentFamilyBg;

class StudentFamilyBgEditModal extends Component
{
    public $show = false;
    public $familyBg;

    public $father_name;
    public $father_occupation;
    public $mother_name;
    public $mother_occupation;

    protected $listeners = [
        'showFamilyBg' => 'openFamilyBg',
    ];

    protected $rules = [
        'father_name' => 'nullable|string|max:255',
        'father_occupation' => 'nullable|string|max:255',
        'mother_name' => 'nullable|string|max:255',
        'mother_occupation' => 'nullable|string|max:255',
    ];

    public function openFamilyBg()
    {
        $this->show = true;
    }

    public function mount(StudentFamilyBg $familyBg)
    {
        $this->familyBg = $familyBg;

        $this->fill([
            'father_name' => $familyBg->father_name,
            'father_occupation' => $familyBg->father_occupation,
            'mother_name' => $familyBg->mother_name,
            'mother_occupation' => $familyBg->mother_occupation,
        ]);
    }

    public function save()
    {
        $this->validate();

        $this->familyBg->update([
            'father_name' => $this->father_name,
            'father_occupation' => $this->father_occupation,
            'mother_name' => $this->mother_name,
            'mother_occupation' => $this->mother_occupation,
        ]);

        $this->show = false;

        $this->dispatch('studentUpdated');

        $this->dispatch('toast',
            message: 'Family background updated successfully!',
            type: 'success'
        );
    }
    
    public function render()
    {
        return view('livewire.student-profile.student-family-bg-edit-modal');
    }
}
