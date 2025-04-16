<div>
    <h1>Livewire Counter</h1>
    
    <div class="flex items-center space-x-4">
        <button  wire:click="decrement" 
            class="px-4 py-2 bg-red-500 text-white rounded">
            -
        </button>
         <span class="text-2xl">{{ $count }}</span>
        
        <button 
            wire:click="increment" 
            class="px-4 py-2 bg-green-500 text-white rounded">
            +
        </button>
    </div>
</div>