<div class="p-4">
    <h1 class="text-xl font-bold mb-4">Student Profile Management</h1>

    <div class="flex items-end gap-2 mb-4">
        <flux:input
            label="Enter Student Number"
            wire:model.defer="search"
            style="width:20rem"
        />

        <flux:button
            variant="primary"
            color="green"
            wire:click="$refresh"
        >
            Search
        </flux:button>
    </div>

    @if($search !== '')
        @if($students->count())
            <flux:table :paginate="$students" class="mt-5">
                <flux:table.columns>
                    <flux:table.column>Student Number</flux:table.column>
                    <flux:table.column>Full Name</flux:table.column>
                    <flux:table.column>Program</flux:table.column>
                    <flux:table.column>Major</flux:table.column>
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
                                {{ $student->major }}
                            </flux:table.cell>
                            <flux:table.cell>View Actions</flux:table.cell>
                        </flux:table.row>
                    @endforeach
                </flux:table.rows>
            </flux:table>
        @else
            <p class="text-gray-500 mt-10 text-center">No results found.</p>
        @endif
    @endif
</div>
