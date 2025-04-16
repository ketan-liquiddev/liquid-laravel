<div class="h-full w-full flex-1">    

<flux:button :href="route('projects.create')" class="mb-4">
        Create
    </flux:button>
    <div class="min-w-full align-middle">        
        <table class="min-w-full divide-y divide-gray-200 border">
            <thead>               
                <tr>
                    <th class="px-6 py-3 bg-gray-50 text-left">
                        <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Name</span>
                    </th>
                    <th class="px-6 py-3 bg-gray-50 text-left">
                        <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Description</span>
                    </th>
                    <th class="px-6 py-3 bg-gray-50 text-left">                       
                        <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Status</span>
                    </th>                    
                    
                    <th class="px-6 py-3 bg-gray-50 text-left">                       
                    </th>
                </tr>
            </thead>            
            <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                @foreach($projects as $project)
                <tr class="bg-white">
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">                        
                        {{ $project->name }}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">                        
                        {{ $project->description }}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">                                        
                        {{ $project->status }}
                    </td>                    
                   
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">                        
                        <flux:button :href="route('projects.edit', $project)">Edit</flux:button>
                        <flux:button variant="danger" wire:click="delete({{ $project->id }})" wire:confirm="Are you sure?">Delete</flux:button>
                    </td>
                </tr>                
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-2">
        {{ $projects->links() }}
    </div>
</div>
