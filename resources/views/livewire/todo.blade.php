<div class="flex justify-center items-center h-full">
    <form wire:submit.prevent="submit">
        <div class="flex border w-full max-w-md">
            <input type="text" wire:model="todo" placeholder="Enter text" class="flex-grow px-4 py-2" />
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white hover:bg-blue-600">
                Search
            </button>
        </div>
        @error('todo') <span class="text-red-500 text-sm mt-2 block">{{ $message }}</span> @enderror 
    </form>
</div>