<div>
    <form wire:submit="save" class="flex flex-col gap-6">
        <flux:input wire:model="name" label="{{ __('Name') }}" type="text" name="name" required autofocus />

        <flux:textarea wire:model="description" label="{{ __('Description') }}" name="description" required />

        <flux:select wire:model="status" label="{{ __('Status') }}" name="status" required>
            <option value="">{{ __('Select Status') }}</option>     
            <option value="active">{{ __('Active') }}</option>     
            <option value="inactive">{{ __('Inactive') }}</option>     
        </flux:select>

        <div>
            <flux:button variant="primary" type="submit">{{ __('Save') }}</flux:button>
        </div>
    </form>
</div>
