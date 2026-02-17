<?php

namespace App\Livewire\StudentProfile;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\StudentProfile;
use App\Models\StudentInformation;
use App\Models\StudentFamilyBg;
use App\Models\StudentGuardian;
use App\Models\StudentEducAttainment;

class StudentEditModal extends Component
{
    public bool $show = false;

    public string $studentNumber;
    public StudentProfile $student;

    /* ================= PERSONAL INFO ================= */
    public $first_name;
    public $middle_name;
    public $last_name;
    public $suffix;
    public $sex;
    public $birth_date;
    public $marital_status;
    public $religion;
    public $citizenship;
    public $street;
    public $brgy;
    public $municipality;
    public $province;

    /* ================= FAMILY ================= */
    public $father_name;
    public $father_occupation;
    public $mother_name;
    public $mother_occupation;

    /* ================= DYNAMIC ARRAYS ================= */
    public $guardians = [];
    public $educations = [];

    protected $listeners = [
        'editStudentInfo' => 'open'
    ];

    /* ============================================================= */

    public function mount(string $studentNumber)
    {
        $this->studentNumber = $studentNumber;

        $this->student = StudentProfile::with([
            'information',
            'familyBg',
            'guardian',
            'educAttainment'
        ])
        ->where('student_number', $studentNumber)
        ->firstOrFail();

        $this->fillForm();
    }

    /* ============================================================= */

    public function open()
    {
        $this->fillForm();
        $this->show = true;
    }

    private function fillForm()
    {
        $info = $this->student->information;
        $family = $this->student->familyBg;

        /* ================= PERSONAL ================= */
        if ($info) {
            $this->fill($info->only([
                'first_name',
                'middle_name',
                'last_name',
                'suffix',
                'sex',
                'birth_date',
                'marital_status',
                'religion',
                'citizenship',
                'street',
                'brgy',
                'municipality',
                'province',
            ]));
        }

        /* ================= FAMILY ================= */
        if ($family) {
            $this->fill($family->only([
                'father_name',
                'father_occupation',
                'mother_name',
                'mother_occupation',
            ]));
        }

        /* ================= GUARDIANS ================= */
        $this->guardians = [];

        foreach ($this->student->guardian as $guardian) {
            $this->guardians[] = [
                'name' => $guardian->guardian_name,
                'relationship' => $guardian->relationship,
                'contact' => $guardian->guardian_number,
            ];
        }

        if (empty($this->guardians)) {
            $this->guardians[] = [
                'name' => '',
                'relationship' => '',
                'contact' => ''
            ];
        }

        /* ================= EDUCATIONS ================= */
        $this->educations = [];

        foreach ($this->student->educAttainment as $educ) {
            $this->educations[] = [
                'educational_level' => $educ->educational_level,
                'school_name' => $educ->school_name,
                'degree' => $educ->degree,
                'field_of_study' => $educ->field_of_study,
                'school_address' => $educ->school_address,
                'year_started' => $educ->year_started,
                'year_ended' => $educ->year_ended,
                'year_graduated' => $educ->year_graduated,
                'status' => $educ->status,
                'honors' => $educ->honors,
            ];
        }

        if (empty($this->educations)) {
            $this->educations[] = [
                'educational_level' => '',
                'school_name' => '',
                'degree' => '',
                'field_of_study' => '',
                'school_address' => '',
                'year_started' => '',
                'year_ended' => '',
                'year_graduated' => '',
                'status' => '',
                'honors' => ''
            ];
        }
    }

    /* ============================================================= */

    protected function rules()
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'sex' => 'required|string',
            'birth_date' => 'required|date',
        ];
    }

    /* ================= ADD METHODS ================= */

    public function addGuardian()
    {
        $this->guardians[] = [
            'name' => '',
            'relationship' => '',
            'contact' => ''
        ];
    }

    public function addEducation()
    {
        $this->educations[] = [
            'educational_level' => '',
            'school_name' => '',
            'degree' => '',
            'field_of_study' => '',
            'school_address' => '',
            'year_started' => '',
            'year_ended' => '',
            'year_graduated' => '',
            'status' => '',
            'honors' => ''
        ];
    }

    /* ================= REMOVE METHODS ================= */

    public function removeGuardian($index)
    {
        unset($this->guardians[$index]);

        // Re-index array for Livewire
        $this->guardians = array_values($this->guardians);

        // Ensure at least one row remains
        if (empty($this->guardians)) {
            $this->addGuardian();
        }
    }

    public function removeEducation($index)
    {
        unset($this->educations[$index]);

        // Re-index array for Livewire
        $this->educations = array_values($this->educations);

        // Ensure at least one row remains
        if (empty($this->educations)) {
            $this->addEducation();
        }
    }


    /* ============================================================= */

    public function saveAll()
    {
        $this->validate();

        DB::transaction(function () {

            /* ================= PERSONAL ================= */
            StudentInformation::updateOrCreate(
                ['id' => $this->student->id],
                [
                    'first_name' => $this->first_name,
                    'middle_name' => $this->middle_name,
                    'last_name' => $this->last_name,
                    'suffix' => $this->suffix,
                    'sex' => $this->sex,
                    'birth_date' => $this->birth_date,
                    'marital_status' => $this->marital_status,
                    'religion' => $this->religion,
                    'citizenship' => $this->citizenship,
                    'street' => $this->street,
                    'brgy' => $this->brgy,
                    'municipality' => $this->municipality,
                    'province' => $this->province,
                ]
            );

            /* ================= FAMILY ================= */
            StudentFamilyBg::updateOrCreate(
                ['id' => $this->student->id],
                [
                    'father_name' => $this->father_name,
                    'father_occupation' => $this->father_occupation,
                    'mother_name' => $this->mother_name,
                    'mother_occupation' => $this->mother_occupation,
                ]
            );

            /* ================= GUARDIANS ================= */
            StudentGuardian::where('student_number', $this->studentNumber)->delete();

            foreach ($this->guardians as $guardian) {
                StudentGuardian::create([
                    'student_number' => $this->studentNumber,
                    'guardian_name' => $guardian['name'],
                    'relationship' => $guardian['relationship'],
                    'guardian_number' => $guardian['contact'],
                ]);
            }

            /* ================= EDUCATIONS ================= */
            StudentEducAttainment::where('student_number', $this->studentNumber)->delete();

            foreach ($this->educations as $education) {
                StudentEducAttainment::create([
                    'student_number' => $this->studentNumber,
                    'educational_level' => $education['educational_level'],
                    'school_name' => $education['school_name'],
                    'degree' => $education['degree'],
                    'field_of_study' => $education['field_of_study'],
                    'school_address' => $education['school_address'],
                    'year_started' => $education['year_started'],
                    'year_ended' => $education['year_ended'],
                    'year_graduated' => $education['year_graduated'],
                    'status' => $education['status'],
                    'honors' => $education['honors'],
                ]);
            }

        });

        $this->show = false;

        $this->dispatch('studentUpdated');
        $this->dispatch('toast',
            message: 'Student profile updated successfully!',
            type: 'success'
        );
    }

    /* ============================================================= */

    public function render()
    {
        return view('livewire.student-profile.student-edit-modal');
    }
}
