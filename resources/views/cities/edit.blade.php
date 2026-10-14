@extends('layouts.app')

@section('title', 'Edit City')

@section('content')
    <h1 class="mb-4 text-2xl font-bold">Edit City</h1>

    <form action="{{ route('cities.update', $city) }}" method="POST">
        @method('PUT')
        @include('cities._form')
    </form>
@endsection
