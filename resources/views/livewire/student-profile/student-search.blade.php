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

    @if($search !== '' && $students->count())
        <flux:table class="mt-5">
            <div class="rounded-lg dark:border-neutral-700 overflow-hidden">
                <table class="min-w-full bg-white dark:bg-neutral-900">
                    <thead class="bg-gray-100 dark:bg-neutral-800">
                        <tr>
                            <th class="px-4 py-3 text-left text-sm font-semibold">Student Number</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold">Full Name</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold">Course</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold">Year Admitted</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold">Semester</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-neutral-200 dark:divide-neutral-700">
                        @foreach($students as $student)
                            <tr class="hover:bg-gray-50 dark:hover:bg-neutral-800 transition">
                                <td class="px-4 py-2 text-sm">{{ $student->student_number }}</td>
                                <td class="px-4 py-2 text-sm">
                                    {{ $student->first_name }}
                                    {{ $student->middle_name }}
                                    {{ $student->last_name }}
                                    {{ $student->suffix }}
                                </td>
                                <td class="px-4 py-2 text-sm">{{ $student->course_code }}</td>
                                <td class="px-4 py-2 text-sm">{{ $student->year_admitted }}</td>
                                <td class="px-4 py-2 text-sm">{{ $student->sem_admitted }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </flux:table>
    @elseif($search !== '')
        <p class="text-gray-500 mt-10 text-center">No results found.</p>
    @endif
</div>
