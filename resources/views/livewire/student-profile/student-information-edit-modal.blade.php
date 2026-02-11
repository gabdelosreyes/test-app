<flux:modal wire:model="show" title="Edit Personal Information" size="lg">
    <h2 class="text-md font-bold mb-4">Edit Personal Information</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        
        <div>
            <flux:input label="First Name" wire:model.defer="first_name" />
        </div>
        <div>
            <flux:input label="Middle Name" wire:model.defer="middle_name" />
        </div>
        <div>
            <flux:input label="Last Name" wire:model.defer="last_name" />
        </div>
        <div>
            <flux:input label="Suffix" wire:model.defer="suffix" />
        </div>
        <div>
            <flux:select label="Sex Assigned at Birth" wire:model.defer="sex">
                <flux:select.option value="">Select</flux:select.option>
                <flux:select.option value="Male">Male</flux:select.option>
                <flux:select.option value="Female">Female</flux:select.option>
            </flux:select>
        </div>
        <div>
            <flux:input label="Birth Date" type="date" wire:model.defer="birth_date" />
        </div>
        <div>
            <flux:select label="Marital Status" wire:model.defer="marital_status">
                <flux:select.option value="">Select</flux:select.option>
                <flux:select.option value="Single">Single</flux:select.option>
                <flux:select.option value="Engaged">Engaged</flux:select.option>
                <flux:select.option value="Married">Married</flux:select.option>
                <flux:select.option value="Widowed">Widowed</flux:select.option>
            </flux:select>
        </div>
        <div>
            <flux:input label="Religion" wire:model.defer="religion" />
        </div>
        <div>
            <flux:input label="Citizenship" wire:model.defer="citizenship" />
        </div>
        <div>
            <flux:input label="Street" wire:model.defer="street" />
        </div>
        <div>
            <flux:input label="Barangay" wire:model.defer="brgy" />
        </div>
        <div>
            <flux:input label="Municipality" wire:model.defer="municipality" />
        </div>
        <div>
            <flux:input label="Province" wire:model.defer="province" />
        </div>
    </div>

    <div class="mt-5 flex justify-end gap-2">
        <flux:button variant="outline" wire:click="$set('show', false)">Cancel</flux:button>
        <flux:button color="green" wire:click="save">Save Changes</flux:button>
    </div>
</flux:modal>


