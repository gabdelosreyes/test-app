<?php

namespace App\Livewire\StudentProfile;

use Livewire\Component;
use App\Models\StudentGuardian;

class StudentGuardianEditModal extends Component
{
    public bool $show = false;

    public ?StudentGuardian $guardian = null;
    public string $student_number;

    // form fields
    public $guardian_name;
    public $relationship;
    public $guardian_number;

    protected $listeners = [
        'addStudentGuardian' => 'create',
        'editStudentGuardian' => 'edit',
    ];

    protected $rules = [
        'guardian_name' => 'required|string|max:255',
        'relationship' => 'required|string|max:255',
        'guardian_number' => 'required|string|max:20',
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

    public function edit($guardianId)
    {
        if (is_array($guardianId)) {
            $guardianId = $guardianId['id'] ?? $guardianId;
        }
        
        $this->guardian = StudentGuardian::findOrFail($guardianId);

        $this->fill($this->guardian->only([
            'guardian_name',
            'relationship',
            'guardian_number',
        ]));

        $this->show = true;
    }

    public function save()
    {
        $this->validate();

        if ($this->guardian) {
            // Update existing record
            $this->guardian->update([
                'guardian_name' => $this->guardian_name,
                'relationship' => $this->relationship,
                'guardian_number' => $this->guardian_number,
            ]);
        } else {
            // Create new record
            StudentGuardian::create([
                'student_number' => $this->student_number,
                'guardian_name' => $this->guardian_name,
                'relationship' => $this->relationship,
                'guardian_number' => $this->guardian_number,
            ]);
        }

        $this->close('Guardian information saved.');
    }

    public function delete()
    {
        if ($this->guardian) {
            $this->guardian->delete();

            $this->close('Guardian information deleted.', 'success');
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
            'guardian',
            'guardian_name',
            'relationship',
            'guardian_number',
        ]);
    }

    public function render()
    {
        return view('livewire.student-profile.student-guardian-edit-modal');
    }
}