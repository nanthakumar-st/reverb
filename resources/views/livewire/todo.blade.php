<div class="flex justify-center items-center h-full flex-col">
    <form wire:submit.prevent="submit" class="w-full max-w-md">
        <div class="flex border">
            <input type="text" wire:model="todo" placeholder="Enter text" class="flex-grow px-4 py-2" />
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white hover:bg-blue-600">
                Submit
            </button>
        </div>
        @error('todo') <span class="text-red-500 text-sm mt-2 block">{{ $message }}</span> @enderror 
    </form>
    <ul class="w-full max-w-md">
        @foreach ($todos as $val)
            <li class="p-2 mb-1 border">{{ $val }}</li>
        @endforeach
    </ul>
</div>