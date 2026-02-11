<flux:modal wire:model="show" title="Guardian Information" size="lg">
    <h2 class="text-md font-bold mb-4">Edit/Add Guardian</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

        <flux:input label="Guardian's Name" wire:model.live="guardian_name" />
        
        <flux:input label="Relationship" wire:model.live="relationship" />
        
        <flux:input label="Contact Number" wire:model.live="guardian_number" />

    </div>

    <div class="mt-6 flex justify-between">
        @if($guardian)
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