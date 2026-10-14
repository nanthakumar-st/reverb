@extends('layouts.app')

@section('title', 'Add City')

@section('content')
    <h1 class="mb-4 text-2xl font-bold">Add City</h1>

    <form action="{{ route('cities.store') }}" method="POST">
        @include('cities._form')
    </form>
@endsection
