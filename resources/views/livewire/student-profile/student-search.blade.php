<div class="p-4">
    <h1 class="text-xl font-bold mb-4">Student Profile Management</h1>

    {{-- Search input --}}

    {{-- <input
        type="number"
        wire:model.debounce.300ms="search"
        placeholder="Enter Student Number"
        class="border rounded p-2 w-75 mb-4"
    /> --}}

    <div class="flex items-end gap-2">
        <flux:input 
            icon="magnifying-glass" 
            type="student_number" 
            label="Enter Student Number" 
            style="width:20rem"
            wire:model.debounce.300ms="search"
        />

        <flux:button 
            variant="primary" 
            color="green"
            wire:click="searchStudent" 
        >
            Search
        </flux:button>
    </div>


    @if($students->isNotEmpty())
        {{-- <p class="text-gray-700 mt-2">Results: {{ $students->count() }} student(s) found</p> --}}

        <table class="min-w-full bg-white border rounded mt-5">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-4 py-2">Student Number</th>
                    <th class="border px-4 py-2">Full Name</th>
                    <th class="border px-4 py-2">Course</th>
                    <th class="border px-4 py-2">Year Admitted</th>
                    <th class="border px-4 py-2">Semester</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                    <tr class="hover:bg-gray-50">
                        <td class="border px-4 py-2">{{ $student->student_number }}</td>
                        <td class="border px-4 py-2">
                            {{ $student->first_name }} 
                            {{ $student->middle_name }} 
                            {{ $student->last_name }} 
                            {{ $student->suffix }}
                        </td>
                        <td class="border px-4 py-2">{{ $student->course_code }}</td>
                        <td class="border px-4 py-2">{{ $student->year_admitted }}</td>
                        <td class="border px-4 py-2">{{ $student->sem_admitted }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @elseif(strlen($search) > 0)
        <p class="text-gray-500 mt-10 text-center" >No results found.</p>
    @endif
    
</div>
