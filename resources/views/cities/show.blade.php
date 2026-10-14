@extends('layouts.app')

@section('title', $city->name)

@section('content')
    <h1 class="mb-4 text-2xl font-bold">{{ $city->name }}</h1>

    <dl class="mb-6">
        <dt class="font-medium">Name</dt>
        <dd class="mb-2">{{ $city->name }}</dd>
        <dt class="font-medium">State</dt>
        <dd class="mb-2">{{ $city->state }}</dd>
    </dl>

    <a href="{{ route('cities.edit', $city) }}" class="text-blue-600">Edit</a>
    <form action="{{ route('cities.destroy', $city) }}" method="POST" class="inline" onsubmit="return confirm('Delete this city?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="ml-2 text-red-600">Delete</button>
    </form>
    <a href="{{ route('cities.index') }}" class="ml-2 text-gray-600">Back to list</a>
@endsection
