<div>
    
    <form wire:submit="save" class="flex flex-col gap-6">
        <flux:input
            wire:model="title"
            label="{{ __('Title') }}"
            type="text"
            name="title"
            required
        />
        
        <flux:textarea
            wire:model="description"
            label="{{ __('Description') }}"
            name="description"
            required
        />
        
        <flux:select
            wire:model="status"
            label="{{ __('Status') }}"
            name="status"
            required
        >
            <option value="">{{ __('Select Status') }}</option>
            <option value="active" @selected($status === 'active')>{{ __('Active') }}</option>
            <option value="inactive" @selected($status === 'inactive')>{{ __('Inactive') }}</option>
        </flux:select>
        
        <flux:select
            wire:model="project_id"
            label="{{ __('Project') }}"
            name="project_id"
            required
        >
            <option value="">{{ __('Select Project') }}</option>
            @foreach($projects as $project)
                <option value="{{ $project->id }}">{{ $project->name }}</option>
            @endforeach
        </flux:select>
        
        <div>
            <flux:button variant="primary" type="submit">{{ __('Save') }}</flux:button>
        </div>
    </form>
    
</div>
