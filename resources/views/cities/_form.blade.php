@csrf

<div class="mb-4">
    <label for="name" class="block font-medium">Name</label>
    <input type="text" id="name" name="name" value="{{ old('name', $city->name ?? '') }}" maxlength="255" required class="w-full rounded border p-2">
    @error('name')
        <p class="text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label for="state" class="block font-medium">State</label>
    <input type="text" id="state" name="state" value="{{ old('state', $city->state ?? '') }}" maxlength="255" required class="w-full rounded border p-2">
    @error('state')
        <p class="text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

<button type="submit" class="rounded bg-blue-600 px-4 py-2 text-white">Save</button>
<a href="{{ route('cities.index') }}" class="ml-2 text-gray-600">Cancel</a>
