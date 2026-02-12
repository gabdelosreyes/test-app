<div class="p-4 w-full max-w-6xl space-y-6">
    <h1 class="text-xl font-bold mb-4">Student Information</h1>

    <flux:card class="space-y-8">
        <div class="flex items-start gap-6">
            <div class="w-32 h-32 border rounded-md overflow-hidden bg-gray-100 flex items-center justify-center">
                @if($student->photo_path ?? false)
                    <img
                        src="{{ asset('storage/' . $student->photo_path) }}"
                        alt="Student Photo"
                        class="object-cover w-full h-full"
                    >
                @else
                    <span class="text-gray-400 text-sm">No Photo</span>
                @endif
            </div>

            {{-- NAME --}}
            <div class="flex-1">
                <h2 class="text-3xl font-bold">
                    {{ $student->information?->first_name }}
                    {{ $student->information?->middle_name }}
                    {{ $student->information?->last_name }}
                    {{ $student->information?->suffix }}
                </h2>

                <p class="text-lg text-gray-500 mt-1">
                    Student No: {{ $student->student_number }}
                </p>
            </div>
        </div>

        <hr class="border-dashed">

        {{-- PERSONAL INFORMATION --}}
        <div class="flex items-center justify-between">
            <flux:heading size="lg">Personal Information</flux:heading>

            <flux:button
                size="sm"
                variant="primary"
                color="blue"
                icon="pencil-square"
                wire:click="$dispatch('showInfo')"
            >
                Edit
            </flux:button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm">
            <div>
                <strong>Sex Assigned at Birth</strong><br>
                {{ $student->information?->sex }}
            </div>

            <div>
                <strong>Birth Date</strong><br>
                {{ $student->information?->birth_date }}
            </div>

            <div>
                <strong>Citizenship</strong><br>
                {{ $student->information?->citizenship }}
            </div>

            <div>
                <strong>Marital Status</strong><br>
                {{ na($student->information?->marital_status) }}
            </div>

            <div>
                <strong>Religion</strong><br>
                {{ na($student->information?->religion) }}
            </div>

            <div>
                <strong>Address</strong><br>
                {{ collect([
                    $student->information?->street,
                    $student->information?->brgy,
                    $student->information?->municipality,
                    $student->information?->province,
                ])->filter()->implode(', ') }}.
            </div>
        </div>

        <hr class="border-dashed">

        {{-- EDUCATIONAL ATTAINMENT --}}
        <div class="flex items-center">
            <flux:heading size="lg" class="mr-5">Educational Attainment</flux:heading>

            <flux:button
                size="sm"
                variant="primary"
                color="green"
                icon="plus"
                wire:click.prevent="$dispatch('addStudentEducAttainment')"
            >
                Add
            </flux:button>
        </div>

        @forelse($student->educAttainment as $attainment)
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm">
                <div class="md:col-span-3 flex justify-end">
                    <flux:button
                        size="sm"
                        variant="primary"
                        color="blue"
                        icon="pencil-square"
                        wire:click.prevent="$dispatch('editStudentEducAttainment', '{{ $attainment->id }}')"
                    >
                        Edit
                    </flux:button>
                </div>

                <div>
                    <strong>Level</strong><br>
                    {{ $attainment->educational_level }}
                </div>

                <div>
                    <strong>School</strong><br>
                    {{ $attainment->school_name }}
                </div>

                @if(in_array($attainment->educational_level, ['College', 'Graduate Studies']))
                    <div>
                        <strong>Degree</strong><br>
                        {{ $attainment->degree }}
                    </div>

                    <div>
                        <strong>Field of Study</strong><br>
                        {{ na($attainment->field_of_study) }}
                    </div>
                @endif

                <div>
                    <strong>Year Started</strong><br>
                    {{ $attainment->year_started }}
                </div>

                <div>
                    <strong>Year Ended</strong><br>
                    {{ $attainment->year_ended }}
                </div>

                <div>
                    <strong>Status</strong><br>
                    {{ $attainment->status }}
                </div>
            </div>

            @if(! $loop->last)
                <hr class="border-dashed">
            @endif
        @empty
            <p class="text-gray-500">No educational attainment records.</p>
        @endforelse

        <hr class="border-dashed">

        {{-- FAMILY BACKGROUND --}}
        <div class="flex items-center justify-between">
            <flux:heading size="lg">Family Background</flux:heading>

            <flux:button
                size="sm"
                variant="primary"
                color="blue"
                icon="pencil-square"
                wire:click="$dispatch('showFamilyBg')"
            >
                Edit
            </flux:button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
            <div>
                <strong>Father's Name</strong><br>
                {{ $student->familyBg->father_name }}
            </div>

            <div>
                <strong>Father's Occupation</strong><br>
                {{ $student->familyBg->father_occupation }}
            </div>

            <div>
                <strong>Mother's Name</strong><br>
                {{ $student->familyBg->mother_name }}
            </div>

            <div>
                <strong>Mother's Occupation</strong><br>
                {{ $student->familyBg->mother_occupation }}
            </div>
        </div>

        <hr class="border-dashed">

        {{-- GUARDIAN --}}
        <div class="flex items-center">
            <flux:heading size="lg" class="mr-5">Guardian</flux:heading>

            <flux:button
                size="sm"
                variant="primary"
                color="green"
                icon="plus"
                wire:click.prevent="$dispatch('addStudentGuardian')"
            >
                Add
            </flux:button>
        </div>

        @forelse($student->guardian as $guardian)
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 text-sm">
                <div>
                    <strong>Name</strong><br>
                    {{ $guardian->guardian_name }}
                </div>

                <div>
                    <strong>Relationship</strong><br>
                    {{ $guardian->relationship }}
                </div>

                <div>
                    <strong>Contact</strong><br>
                    {{ $guardian->guardian_number }}
                </div>

                <div class="flex items-end">
                    <flux:button
                        size="sm"
                        variant="primary"
                        color="blue"
                        icon="pencil-square"
                        wire:click.prevent="$dispatch('editStudentGuardian', '{{ $guardian->id }}')"
                    >
                        Edit
                    </flux:button>
                </div>
            </div>

            @if(! $loop->last)
                <hr class="border-dashed">
            @endif
        @empty
            <p class="text-gray-500">No guardian information.</p>
        @endforelse

    </flux:card>

   {{-- BACK BUTTON --}} 
    <div class="flex justify-start"> 
        <flux:button variant="outline" x-on:click.prevent=" const back = sessionStorage.getItem('students_back_url'); back ? window.location.href = back : window.history.back(); " >   
            ← Back to Results 
        </flux:button> 
    </div>

    {{-- MODALS --}}
    <livewire:student-profile.student-information-edit-modal :student="$student->information" />
    <livewire:student-profile.student-educ-attainment-edit-modal :student_number="$student->student_number" />
    <livewire:student-profile.student-family-bg-edit-modal :familyBg="$student->familyBg" />
    <livewire:student-profile.student-guardian-edit-modal :student_number="$student->student_number" />
</div>
