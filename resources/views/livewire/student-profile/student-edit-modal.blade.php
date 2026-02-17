<flux:modal
    wire:model="show"
    title="Edit Student Profile"
    class="w-full max-w-5xl"
>

    <div class="max-h-[75vh] overflow-y-auto pr-4 space-y-10">

        {{-- ================= PERSONAL INFORMATION ================= --}}
        <div>
            <h2 class="text-lg font-bold mb-4 border-b pb-2">
                Personal Information
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                <flux:input label="First Name" wire:model.defer="first_name" />
                <flux:input label="Middle Name" wire:model.defer="middle_name" />
                <flux:input label="Last Name" wire:model.defer="last_name" />
                <flux:input label="Suffix" wire:model.defer="suffix" />

                <flux:select label="Sex Assigned at Birth" wire:model.defer="sex">
                    <flux:select.option value="">Select</flux:select.option>
                    <flux:select.option value="Male">Male</flux:select.option>
                    <flux:select.option value="Female">Female</flux:select.option>
                </flux:select>

                <flux:input type="date" label="Birth Date" wire:model.defer="birth_date" />

                <flux:select label="Marital Status" wire:model.defer="marital_status">
                    <flux:select.option value="">Select</flux:select.option>
                    <flux:select.option value="Single">Single</flux:select.option>
                    <flux:select.option value="Engaged">Engaged</flux:select.option>
                    <flux:select.option value="Married">Married</flux:select.option>
                    <flux:select.option value="Widowed">Widowed</flux:select.option>
                </flux:select>

                <flux:input label="Religion" wire:model.defer="religion" />
                <flux:input label="Citizenship" wire:model.defer="citizenship" />

                <flux:input label="Street" wire:model.defer="street" />
                <flux:input label="Barangay" wire:model.defer="brgy" />
                <flux:input label="Municipality" wire:model.defer="municipality" />
                <flux:input label="Province" wire:model.defer="province" />
            </div>
        </div>


        {{-- ================= FAMILY BACKGROUND ================= --}}
        <div>
            <h2 class="text-lg font-bold mb-4 border-b pb-2">
                Family Background
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <flux:input label="Father's Name" wire:model.defer="father_name" />
                <flux:input label="Father's Occupation" wire:model.defer="father_occupation" />
                <flux:input label="Mother's Name" wire:model.defer="mother_name" />
                <flux:input label="Mother's Occupation" wire:model.defer="mother_occupation" />
            </div>
        </div>


        {{-- ================= GUARDIAN ================= --}}
        <div>
            <div class="flex justify-between items-center mb-4 border-b pb-2">
                <h2 class="text-lg font-bold">Guardian</h2>

                <flux:button size="sm" wire:click="addGuardian">
                    + Add Guardian
                </flux:button>
            </div>

            @foreach($guardians as $index => $guardian)
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4">

                    <flux:input label="Guardian's Name"
                        wire:model.defer="guardians.{{ $index }}.name" />

                    <flux:input label="Relationship"
                        wire:model.defer="guardians.{{ $index }}.relationship" />

                    <flux:input label="Contact Number"
                        wire:model.defer="guardians.{{ $index }}.contact" />
                
                    <div class="flex items-end">
                        <flux:button 
                            variant="danger"
                            wire:click="removeGuardian({{ $index }})"
                            icon="trash" 
                        />
                    </div>

                </div>
            @endforeach
            
        </div>



        {{-- ================= EDUCATIONAL ATTAINMENT ================= --}}
        <div>
            <div class="flex justify-between items-center mb-4 border-b pb-2">
                <h2 class="text-lg font-bold">Educational Attainment</h2>

                <flux:button size="sm" wire:click="addEducation">
                    + Add Education
                </flux:button>
            </div>

            @foreach($educations as $index => $education)
                <div class="border p-4 rounded-xl mb-6 space-y-4 relative">

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                        <flux:select label="Educational Level"
                            wire:model.live="educations.{{ $index }}.educational_level">

                            <flux:select.option value="">Select</flux:select.option>
                            <flux:select.option value="Primary">Primary</flux:select.option>
                            <flux:select.option value="Secondary">Secondary</flux:select.option>
                            <flux:select.option value="Vocational">Vocational</flux:select.option>
                            <flux:select.option value="College">College</flux:select.option>
                            <flux:select.option value="Graduate Studies">Graduate Studies</flux:select.option>
                        </flux:select>

                        <flux:input label="School Name"
                            wire:model.defer="educations.{{ $index }}.school_name" />

                        @if(in_array($education['educational_level'], ['College', 'Graduate Studies', 'Vocational']))
                            <flux:input label="Degree"
                                wire:model.defer="educations.{{ $index }}.degree" />

                            <flux:input label="Field of Study"
                                wire:model.defer="educations.{{ $index }}.field_of_study" />
                        @endif

                        <flux:input label="School Address"
                            wire:model.defer="educations.{{ $index }}.school_address" />

                        <flux:input label="Year Started"
                            wire:model.defer="educations.{{ $index }}.year_started" />

                        <flux:input label="Year Ended"
                            wire:model.defer="educations.{{ $index }}.year_ended" />

                        <flux:input label="Year Graduated"
                            wire:model.defer="educations.{{ $index }}.year_graduated" />

                        <flux:select label="Status"
                            wire:model.defer="educations.{{ $index }}.status">

                            <flux:select.option value="">Select</flux:select.option>
                            <flux:select.option value="Completed">Completed</flux:select.option>
                            <flux:select.option value="Dropped">Dropped</flux:select.option>
                            <flux:select.option value="Ongoing">Ongoing</flux:select.option>
                        </flux:select>

                        <flux:input label="Honors"
                            wire:model.defer="educations.{{ $index }}.honors" />

                        <div class="flex items-end">
                            <flux:button 
                                variant="danger"
                                wire:click="removeEducation({{ $index }})"
                                icon="trash" 
                            />
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- FOOTER --}}
    <div class="mt-6 flex justify-end gap-3 border-t pt-4">
        <flux:button variant="outline" wire:click="$set('show', false)">
            Cancel
        </flux:button>

        <flux:button variant="primary" color="green" wire:click="saveAll">
            Save All Changes
        </flux:button>
    </div>

</flux:modal>
