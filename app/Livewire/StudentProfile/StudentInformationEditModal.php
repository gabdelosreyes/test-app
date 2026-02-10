<?php

namespace App\Livewire\StudentProfile;

use Livewire\Component;
use App\Models\StudentInformation;

class StudentInformationEditModal extends Component
{
    protected $listeners = [
        'showModal' => 'openModal',
    ];

    public function openModal()
    {
        $this->show = true;
    }
    
    public $show = false; // Controls modal visibility
    public $student; // StudentInformation model

    // Editable fields
    public $first_name;
    public $middle_name;
    public $last_name;
    public $suffix;
    public $birth_date;
    public $marital_status;
    public $religion;
    public $citizenship;
    public $street;
    public $brgy;
    public $municipality;
    public $province;

    protected $rules = [
        'first_name' => 'required|string|max:255',
        'middle_name' => 'nullable|string|max:255',
        'last_name' => 'required|string|max:255',
        'suffix' => 'nullable|string|max:10',
        'birth_date' => 'required|date',
        'marital_status' => 'nullable|string',
        'religion' => 'nullable|string',
        'citizenship' => 'nullable|string',
        'street' => 'nullable|string',
        'brgy' => 'nullable|string',
        'municipality' => 'nullable|string',
        'province' => 'nullable|string',
    ];

    public function mount(StudentInformation $student)
    {
        $this->student = $student;

        // Populate editable fields
        $this->fill([
            'first_name' => $student->first_name,
            'middle_name' => $student->middle_name,
            'last_name' => $student->last_name,
            'suffix' => $student->suffix,
            'birth_date' => $student->birth_date,
            'marital_status' => $student->marital_status,
            'religion' => $student->religion,
            'citizenship' => $student->citizenship,
            'street' => $student->street,
            'brgy' => $student->brgy,
            'municipality' => $student->municipality,
            'province' => $student->province,
        ]);
    }

    public function save()
    {
        $this->validate();

        $this->student->update([
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'suffix' => $this->suffix,
            'birth_date' => $this->birth_date,
            'marital_status' => $this->marital_status,
            'religion' => $this->religion,
            'citizenship' => $this->citizenship,
            'street' => $this->street,
            'brgy' => $this->brgy,
            'municipality' => $this->municipality,
            'province' => $this->province,
        ]);

        $this->show = false;

        $this->dispatch('studentUpdated');
    }

    public function render()
    {
        return view('livewire.student-profile.student-information-edit-modal');
    }
}
