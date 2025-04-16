@livewireStyles()

<x-layouts.app>
    <a href="{{ route('projects.create') }}">Create</a>    
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
                        <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">User</span>                   
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
                        {{ $project->user->name }}                                    
                    </td>                        
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">                            
                        <a href="{{ route('projects.edit',$project) }}">Edit</a>                            
                        <button>Delete</button>                        
                    </td>                    
                </tr>                
                @endforeach                
            </tbody>            
        </table>        
    </div>    
    <div class="mt-2">        
        {{ $projects->links() }}    
    </div>    
</x-layouts.app>                
@livewireScripts()