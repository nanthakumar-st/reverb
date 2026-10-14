@extends('layouts.app')

@section('title', 'Cities')

@section('content')
    <div class="mb-4 flex items-center justify-between">
        <h1 class="text-2xl font-bold">Cities</h1>
        <a href="{{ route('cities.create') }}" class="rounded bg-blue-600 px-4 py-2 text-white">Add City</a>
    </div>

    @if ($cities->isEmpty())
        <p>No cities yet.</p>
    @else
        <table class="w-full border-collapse">
            <thead>
                <tr class="border-b text-left">
                    <th class="p-2">Name</th>
                    <th class="p-2">State</th>
                    <th class="p-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cities as $city)
                    <tr class="border-b">
                        <td class="p-2"><a href="{{ route('cities.show', $city) }}" class="text-blue-600">{{ $city->name }}</a></td>
                        <td class="p-2">{{ $city->state }}</td>
                        <td class="p-2">
                            <a href="{{ route('cities.edit', $city) }}" class="text-blue-600">Edit</a>
                            <form action="{{ route('cities.destroy', $city) }}" method="POST" class="inline" onsubmit="return confirm('Delete this city?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="ml-2 text-red-600">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">{{ $cities->links() }}</div>
    @endif
@endsection
