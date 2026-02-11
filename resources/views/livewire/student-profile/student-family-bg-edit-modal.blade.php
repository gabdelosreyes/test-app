<flux:modal wire:model="show" title="Edit Family Background" size="lg">
    <h2 class="text-md font-bold mb-4">Edit Family Background</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        
        <div>
            <flux:input label="Father's Name" wire:model.defer="father_name" />
        </div>
        
        <div>
            <flux:input label="Father's Occupation" wire:model.defer="father_occupation" />
        </div>
        
        <div>
            <flux:input label="Mother's Name" wire:model.defer="mother_name" />
        </div>
        
        <div>
            <flux:input label="Mother's Occupation" wire:model.defer="mother_occupation" />
        </div>
    </div>

    <div class="mt-5 flex justify-end gap-2">
        <flux:button variant="outline" wire:click="$set('show', false)">Cancel</flux:button>
        <flux:button variant="primary" color="green" wire:click="save">Save Changes</flux:button>
    </div>
</flux:modal>