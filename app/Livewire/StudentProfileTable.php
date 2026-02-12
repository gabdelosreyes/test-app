<?php

namespace App\Livewire;

use App\Models\StudentProfile;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class StudentProfileTable extends PowerGridComponent
{
    public string $tableName = 'StudentProfileTable';

    public function setUp(): array
    {
        return [
            PowerGrid::header()
                ->showSearchInput()
                ->showToggleColumns(),
            PowerGrid::footer()
                ->showPerPage(10, [10, 25, 50, 100])
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return StudentProfile::query()
            ->join('student_information', 'student_profiles.student_number', '=', 'student_information.student_number')
            ->select(
                'student_profiles.*',
                DB::raw("CONCAT(student_information.first_name, ' ', student_information.last_name) as full_name")
            )
            ->orderBy('student_profiles.program');
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('student_number')
            ->add('full_name')
            ->add('program')
            ->add('year_level');
    }

    public function columns(): array
    {
        return [
            Column::make('Student Number', 'student_number')
                ->searchable()
                ->sortable(),

            Column::make('Full Name', 'full_name')
                ->sortable()
                ->searchableRaw(
                    "CONCAT(student_information.first_name, ' ', student_information.last_name) LIKE ?"
                ),

            Column::make('Program', 'program')
                ->searchable()
                ->sortable(),

            Column::make('Year Level', 'year_level')
                ->sortable(),

            Column::action('Actions')
        ];
    }

    public function actions(StudentProfile $row): array
    {
        return [
            Button::add('view')
                ->slot('View Info')
                ->class('btn btn-sm btn-primary')
                ->route('student.info', ['studentNumber' => $row->student_number])
                ->attributes([
                    'x-on:click' => "sessionStorage.setItem('students_back_url', window.location.href)"
                ]),
            
            Button::add('delete')
                ->slot('Delete')
                ->class('btn btn-sm btn-danger')
                ->dispatch('deleteStudent', ['student' => $row->student_number])
                ->confirm('Are you sure you want to delete this student?')
        ];
    }
}
