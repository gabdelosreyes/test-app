<?php

namespace App\Livewire;

use App\Models\StudentProfile;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\Facades\Rule;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class StudentProfileTable extends PowerGridComponent
{
    public string $tableName = 'student-profile-table';

    public function setUp(): array
    {
        return [
            PowerGrid::header()
                ->showSearchInput()
                ->showToggleColumns(),

            PowerGrid::footer()
                ->showPerPage(10, [10, 25, 50, 100])
                ->showRecordCount(),

            // Add detail row setup
            PowerGrid::detail()
                ->view('components.student-profile-detail') // your blade for detail content
                ->showCollapseIcon()
                ->params([]), // optional extra params
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

            Column::action('Actions') // toggle detail
        ];
    }

    public function actions(StudentProfile $row): array
    {
        return [
            Button::add('details')
                ->slot('Details')
                ->class('bg-green-600 text-white px-3 py-1 rounded-lg shadow hover:bg-green-700 transition')
                ->toggleDetail($row->id),
        ];
    }


}
