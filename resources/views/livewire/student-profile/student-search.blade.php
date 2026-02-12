<div class="p-4 w-full max-w-6xl">
    <h1 class="text-xl font-bold mb-4">Student Profile Management</h1>

    <livewire:student-profile-table />
    
    {{-- <div class="flex items-end gap-2 mb-4">
        <flux:input
            label="Enter Student Number"
            wire:model.lazy="search"
            style="width:20rem"
        />
    </div>

    @if($search !== '')
        @if($students->count())
            <flux:table :paginate="$students" class="mt-4">
                <flux:table.columns>
                    <flux:table.column>Student Number</flux:table.column>
                    <flux:table.column>Full Name</flux:table.column>
                    <flux:table.column>Program</flux:table.column>
                    <flux:table.column>Year Level</flux:table.column>
                    <flux:table.column>Actions</flux:table.column>
                </flux:table.columns>

                <flux:table.rows>
                    @foreach($students as $student)
                        <flux:table.row>
                            <flux:table.cell>{{ $student->student_number }}</flux:table.cell>
                            <flux:table.cell>
                                {{ $student->information->first_name }}
                                {{ $student->information->last_name }}
                            </flux:table.cell>
                            <flux:table.cell>
                                {{ $student->program }}
                            </flux:table.cell>
                            <flux:table.cell>
                                {{ $student->year_level }}
                            </flux:table.cell>
                            <flux:table.cell>
                                <flux:dropdown>
                                    <flux:button icon:trailing="chevron-down" size="sm">
                                    View Actions
                                    </flux:button>
                                    <flux:menu>
                                        <flux:menu.item icon="user-circle" 
                                            as="a"
                                            href="{{ route('student.info', $student->student_number) }}"
                                            x-on:click="sessionStorage.setItem('students_back_url', window.location.href)"
                                        >
                                        View Student Information
                                        </flux:menu.item>
                                        <flux:menu.item variant="danger" icon="trash">Delete</flux:menu.item>
                                    </flux:menu>
                                </flux:dropdown>
                            </flux:table.cell>
                        </flux:table.row>
                    @endforeach
                </flux:table.rows>
            </flux:table>
        @else
            <p class="text-gray-500 mt-10 text-center">No results found.</p>
        @endif
    @endif --}}
</div>
