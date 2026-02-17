<div class="p-6 w-full max-w-7xl mx-auto space-y-8">

    {{-- HEADER --}}
    <flux:card class="p-6">

        <div class="flex justify-between items-start">

            <div class="flex gap-6 items-center">
                {{-- PHOTO --}}
                <div class="w-36 h-36 border rounded-xl overflow-hidden bg-gray-100 flex items-center justify-center shadow">
                    @if($student->photo_path ?? false)
                        <img
                            src="{{ asset('storage/' . $student->photo_path) }}"
                            class="object-cover w-full h-full"
                        >
                    @else
                        <span class="text-gray-400 text-sm">No Photo</span>
                    @endif
                </div>

                {{-- NAME --}}
                <div>
                    <h1 class="text-3xl font-bold">
                        {{ $student->information?->first_name }}
                        {{ $student->information?->middle_name }}
                        {{ $student->information?->last_name }}
                        {{ $student->information?->suffix }}
                    </h1>

                    <p class="text-gray-500 mt-2">
                        Student No: <span class="font-semibold">{{ $student->student_number }}</span>
                    </p>
                </div>
            </div>

            {{-- SINGLE EDIT BUTTON --}}
            <flux:button
                variant="primary"
                color="blue"
                icon="pencil-square"
                wire:click="$dispatch('editStudentInfo')"
            >
                Edit Profile
            </flux:button>

        </div>
    </flux:card>

    {{-- PERSONAL INFORMATION --}}
    <flux:card class="p-6">
        <flux:heading size="lg" class="mb-4">Personal Information</flux:heading>

        <div class="overflow-x-auto">
            <table class="min-w-full text-sm border rounded-lg overflow-hidden">
                <tbody class="divide-y">

                    <tr>
                        <td class="font-semibold w-1/3 p-3 ">Sex Assigned at Birth</td>
                        <td class="p-3">{{ $student->information?->sex }}</td>
                    </tr>

                    <tr>
                        <td class="font-semibold p-3">Birth Date</td>
                        <td class="p-3">{{ $student->information?->birth_date }}</td>
                    </tr>

                    <tr>
                        <td class="font-semibold p-3 ">Citizenship</td>
                        <td class="p-3">{{ $student->information?->citizenship }}</td>
                    </tr>

                    <tr>
                        <td class="font-semibold p-3 ">Marital Status</td>
                        <td class="p-3">{{ na($student->information?->marital_status) }}</td>
                    </tr>

                    <tr>
                        <td class="font-semibold p-3 ">Religion</td>
                        <td class="p-3">{{ na($student->information?->religion) }}</td>
                    </tr>

                    <tr>
                        <td class="font-semibold p-3 ">Address</td>
                        <td class="p-3">
                            {{ collect([
                                $student->information?->street,
                                $student->information?->brgy,
                                $student->information?->municipality,
                                $student->information?->province,
                            ])->filter()->implode(', ') }}
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </flux:card>


    {{-- EDUCATIONAL ATTAINMENT --}}
    <flux:card class="p-6">
        <flux:heading size="lg" class="mb-4">Educational Attainment</flux:heading>

        <div class="overflow-x-auto">
            <table class="min-w-full text-sm border rounded-lg overflow-hidden">
                <thead class="text-left">
                    <tr>
                        <th class="p-3">Level</th>
                        <th class="p-3">School</th>
                        <th class="p-3">Degree</th>
                        <th class="p-3">Field</th>
                        <th class="p-3">Year Started</th>
                        <th class="p-3">Year Ended</th>
                        <th class="p-3">Year Graduated</th>
                        <th class="p-3">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y">

                    @forelse($student->educAttainment as $attainment)
                        <tr>
                            <td class="p-3">{{ $attainment->educational_level }}</td>
                            <td class="p-3">{{ $attainment->school_name }}</td>
                            <td class="p-3">{{ na($attainment->degree) }}</td>
                            <td class="p-3">{{ na($attainment->field_of_study) }}</td>
                            <td class="p-3">{{ $attainment->year_started }}</td>
                            <td class="p-3">{{ $attainment->year_ended }}</td>
                            <td class="p-3">{{ $attainment->year_graduated }}</td>
                            <td class="p-3">{{ $attainment->status }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="p-4 text-center text-gray-500">
                                No educational attainment records.
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </flux:card>


    {{-- FAMILY BACKGROUND --}}
    <flux:card class="p-6">
        <flux:heading size="lg" class="mb-4">Family Background</flux:heading>

        <table class="min-w-full text-sm border rounded-lg overflow-hidden">
            <tbody class="divide-y">
                <tr>
                    <td class="font-semibold w-1/3 p-3 ">Father's Name</td>
                    <td class="p-3">{{ $student->familyBg->father_name ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="font-semibold p-3 ">Father's Occupation</td>
                    <td class="p-3">{{ $student->familyBg->father_occupation ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="font-semibold p-3 ">Mother's Name</td>
                    <td class="p-3">{{ $student->familyBg->mother_name ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="font-semibold p-3 ">Mother's Occupation</td>
                    <td class="p-3">{{ $student->familyBg->mother_occupation ?? 'N/A' }}</td>
                </tr>
            </tbody>
        </table>
    </flux:card>


    {{-- GUARDIAN --}}
    <flux:card class="p-6">
        <flux:heading size="lg" class="mb-4">Guardian</flux:heading>

        <div class="overflow-x-auto">
            <table class="min-w-full text-sm border rounded-lg overflow-hidden">
                <thead class="text-left">
                    <tr>
                        <th class="p-3">Name</th>
                        <th class="p-3">Relationship</th>
                        <th class="p-3">Contact</th>
                    </tr>
                </thead>
                <tbody class="divide-y">

                    @forelse($student->guardian as $guardian)
                        <tr>
                            <td class="p-3">{{ $guardian->guardian_name }}</td>
                            <td class="p-3">{{ $guardian->relationship }}</td>
                            <td class="p-3">{{ $guardian->guardian_number }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="p-4 text-center text-gray-500">
                                No guardian information.
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </flux:card>


    {{-- BACK BUTTON --}}
    <div>
        <flux:button
            variant="outline"
            x-on:click.prevent="
                const back = sessionStorage.getItem('students_back_url');
                back ? window.location.href = back : window.history.back();
            "
        >
            ← Back to Results
        </flux:button>
    </div>

    <livewire:student-profile.student-edit-modal 
        :studentNumber="$student->student_number" 
    />
</div>


