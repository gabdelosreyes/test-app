<flux:modal wire:model="show" title="Educational Attainment" size="lg">
    <h2 class="text-md font-bold mb-4">Edit/Add Educational Attainment</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

        <flux:select label="Educational Level" wire:model.live="educational_level">
            <flux:select.option value="">Select</flux:select.option>
            <flux:select.option value="Primary">Primary</flux:select.option>
            <flux:select.option value="Secondary">Secondary</flux:select.option>
            <flux:select.option value="Vocational">Vocational</flux:select.option>
            <flux:select.option value="College">College</flux:select.option>
            <flux:select.option value="Graduate Studies">Graduate Studies</flux:select.option>
        </flux:select>

        <flux:input label="School Name" wire:model.live="school_name" />
        
        @if(in_array($educational_level, ['College', 'Graduate Studies', 'Vocational']))
            <flux:input label="Degree" wire:model.live="degree" />
            <flux:input label="Field of Study" wire:model.live="field_of_study" />
        @endif
        
        <flux:input label="School Address" wire:model.live="school_address" />

        <flux:input label="Year Started" wire:model.live="year_started" />
        <flux:input label="Year Ended" wire:model.live="year_ended" />
        <flux:input label="Year Graduated" wire:model.live="year_graduated" />
        <flux:select label="Status" wire:model.live="status">
            <flux:select.option value="">Select</flux:select.option>
            <flux:select.option value="Completed">Completed</flux:select.option>
            <flux:select.option value="Dropped">Dropped</flux:select.option>
            <flux:select.option value="Ongoing">Ongoing</flux:select.option>
        </flux:select>
        <flux:input label="Honors" wire:model.live="honors" />
    </div>

    <div class="mt-6 flex justify-between">
        @if($attainment)
            <flux:button variant="primary" color="red" wire:click="delete">
                Delete
            </flux:button>
        @else
            <div></div>
        @endif

        <div class="flex gap-2">
            <flux:button variant="outline" wire:click="$set('show', false)">
                Cancel
            </flux:button>
            <flux:button variant="primary" color="green" wire:click="save">
                Save
            </flux:button>
        </div>
    </div>

</flux:modal>