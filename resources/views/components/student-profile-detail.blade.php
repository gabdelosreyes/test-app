<div class="flex flex-col items-start gap-2 p-4 rounded-lg border-gray-200">
    <!-- View Info Button -->
    <flux:button
        variant="primary"
        color="blue"
        icon="eye"
        class="inline-flex"
        href="{{ route('student.info', ['studentNumber' => $row->student_number]) }}"
        x-on:click="sessionStorage.setItem('students_back_url', window.location.href)"
    >
        View Student Information
    </flux:button>

    {{-- <!-- Edit Info Button -->
    <flux:button
        variant="primary"
        color="yellow"
        icon="pencil-square"
        class="inline-flex"
        href="{{ route('student.info', ['studentNumber' => $row->student_number]) }}"
        x-on:click="sessionStorage.setItem('students_back_url', window.location.href)"
    >
        Edit Info
    </flux:button> --}}
</div>
