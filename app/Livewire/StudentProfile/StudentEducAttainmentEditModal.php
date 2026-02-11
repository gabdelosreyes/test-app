<?php

namespace App\Livewire\StudentProfile;

use Livewire\Component;
use App\Models\StudentEducAttainment;

class StudentEducAttainmentEditModal extends Component
{
    public bool $show = false;

    public ?StudentEducAttainment $attainment = null;
    public string $student_number; 

    // form fields
    public $educational_level;
    public $school_name;
    public $degree;
    public $field_of_study;
    public $school_address;
    public $year_started;
    public $year_ended;
    public $year_graduated;
    public $status;
    public $honors;

    protected $listeners = [
        'addStudentEducAttainment' => 'create',
        'editStudentEducAttainment' => 'edit',
    ];

    protected $rules = [
        'educational_level' => 'required|string',
        'school_name' => 'required|string',
        'degree' => 'nullable|string',
        'field_of_study' => 'nullable|string',
        'school_address' => 'nullable|string',
        'year_started' => 'nullable|integer',
        'year_ended' => 'nullable|integer',
        'year_graduated' => 'nullable|integer',
        'status' => 'required|string',
        'honors' => 'nullable|string',
    ];

    public function mount(string $student_number)
    {
        $this->student_number = $student_number;
    }

    /* ---------- Actions ---------- */

    public function create()
    {
        $this->resetForm();
        $this->show = true;
    }

    public function edit($attainmentId)
    {
        if (is_array($attainmentId)) {
            $attainmentId = $attainmentId['id'] ?? $attainmentId;
        }
        
        $this->attainment = StudentEducAttainment::findOrFail($attainmentId);

        $this->fill($this->attainment->only([
            'educational_level',
            'school_name',
            'degree',
            'field_of_study',
            'school_address',
            'year_started',
            'year_ended',
            'year_graduated',
            'status',
            'honors',
        ]));

        $this->show = true;
    }

    public function save()
    {
        $this->validate();

        if ($this->attainment) {
            // Update existing record
            $this->attainment->update([
                'educational_level' => $this->educational_level,
                'school_name' => $this->school_name,
                'degree' => $this->degree,
                'field_of_study' => $this->field_of_study,
                'school_address' => $this->school_address,
                'year_started' => $this->year_started,
                'year_ended' => $this->year_ended,
                'year_graduated' => $this->year_graduated,
                'status' => $this->status,
                'honors' => $this->honors,
            ]);
        } else {
            // Create new record
            StudentEducAttainment::create([
                'student_number' => $this->student_number,
                'educational_level' => $this->educational_level,
                'school_name' => $this->school_name,
                'degree' => $this->degree,
                'field_of_study' => $this->field_of_study,
                'school_address' => $this->school_address,
                'year_started' => $this->year_started,
                'year_ended' => $this->year_ended,
                'year_graduated' => $this->year_graduated,
                'status' => $this->status,
                'honors' => $this->honors,
            ]);
        }

        $this->close('Educational attainment saved.');
    }

    public function delete()
    {
        if ($this->attainment) {
            $this->attainment->delete();

            $this->close('Educational attainment deleted.', 'sucess');
        }
    }

    private function close(string $message, string $type = 'success')
    {
        $this->show = false;
        $this->resetForm();

        $this->dispatch('studentUpdated');

        $this->dispatch('toast',
            message: $message,
            type: $type
        );
    }

    private function resetForm()
    {
        $this->reset([
            'attainment',
            'educational_level',
            'school_name',
            'degree',
            'field_of_study',
            'school_address',
            'year_started',
            'year_ended',
            'year_graduated',
            'status',
            'honors',
        ]);
    }

    public function render()
    {
        return view('livewire.student-profile.student-educ-attainment-edit-modal');
    }
}
