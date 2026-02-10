<div class="p-4 w-full max-w-6xl">
    <h1 class="text-xl font-bold mb-4">Student Information</h1>

    {{-- PERSONAL INFORMATION --}}
    <flux:card>
        <div class="flex items-center justify-between">
            <flux:heading size="lg">Personal Information</flux:heading>

            <flux:button
                type="button"
                variant="primary"
                icon="pencil-square"
                color="green"
                size="sm"
                wire:click="$dispatch('showModal')"
            >
                Edit Personal Information
            </flux:button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4 text-sm">
            <div>
                <strong>Name</strong><br>
                {{ $student->information?->first_name }}
                {{ $student->information?->middle_name }}
                {{ $student->information?->last_name }}
                {{ $student->information?->suffix }}
            </div>

            <div>
                <strong>Birth Date</strong><br>
                {{ $student->information?->birth_date }}
            </div>

            <div>
                <strong>Marital Status</strong><br>
                {{ na($student->information?->marital_status) }}
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4 text-sm">
            <div>
                <strong>Religion</strong><br>
                {{ na($student->information?->religion) }}
            </div>

            <div>
                <strong>Citizenship</strong><br>
                {{ $student->information?->citizenship }}
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

        <flux:separator class="my-5"/>

        <flux:heading size="lg">Educational Attainment</flux:heading>

        @forelse($student->educAttainment as $attainment)
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4 text-sm">

                <div>
                    <strong>School</strong><br>
                    {{ $attainment->school_name }}
                </div>

                <div>
                    <strong>Educational Level</strong><br>
                    {{ $attainment->educational_level }}
                </div>

                {{-- Only show degree and field of study for College or Graduate Studies --}}
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
                    <strong>School Address</strong><br>
                    {{ $attainment->school_address }}
                </div>

                <div>
                    <strong>Honors</strong><br>
                    {{ na($attainment->honors) }}
                </div>

                <div>
                    <strong>Year Started</strong><br>
                    {{ $attainment->year_started }}
                </div>

                <div class="mb-5">
                    <strong>Year Ended</strong><br>
                    {{ $attainment->year_ended }}
                </div>

            </div>
        @empty
            <p class="text-gray-500 mt-4">No information available.</p>
        @endforelse


        <flux:separator class="my-5"/>

        <flux:heading size="lg">Family Background</flux:heading>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4 text-sm">
            <div>
                <strong>Father's Name</strong><br>
                {{ $student->familyBg->father_name }}
            </div>

            <div>
                <strong>Father's Occupation</strong><br>
                {{ $student->familyBg->father_occupation }}
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4 text-sm">
            <div>
                <strong>Mother's Name</strong><br>
                {{ $student->familyBg->mother_name }}
            </div>

            <div>
                <strong>Mother's Occupation</strong><br>
                {{ $student->familyBg->mother_occupation }}
            </div>
        </div>

        <flux:separator class="my-5"/>

        <flux:heading size="lg">Guardian</flux:heading>

        @forelse($student->guardian as $guardian)
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4 text-sm">
                <div>
                    <strong>Guardian's Name</strong><br>
                    {{ $guardian->guardian_name }}
                </div>

                <div>
                    <strong>Relationship</strong><br>
                    {{ $guardian->relationship }}
                </div>

                <div>
                    <strong>Contact Number</strong><br>
                    {{ $guardian->guardian_number }}
                </div>
            </div>
        @empty
            <p class="text-gray-500 mt-4">No information available.</p>
        @endforelse
        

    <div class="mt-10 flex justify-start">
        <flux:button
            as="a"
            href="{{ url()->previous() }}"
            variant="outline"
        >
            ← Back to Results
        </flux:button>
    </div>

    </flux:card>

    <livewire:student-profile.student-information-edit-modal 
        :student="$student->information"
    />

</div>
