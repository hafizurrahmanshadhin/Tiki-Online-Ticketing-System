@extends('layouts.app')

@section('content')
    <h1>Create a Trip</h1>

    <form method="post" action="{{ route('trips.store') }}">
        @csrf
        <label for="date">Trip Date:</label>
        <input type="date" name="date" required>

        <label for="locations">Select Locations:</label>
        <select name="locations[]" multiple required>
            @foreach($locations as $location)
                <option value="{{ $location->id }}">{{ $location->name }}</option>
            @endforeach
        </select>

        <button type="submit">Create Trip</button>
    </form>
@endsection
