@extends('layouts.app')

@section('content')
    <h1>Available Trips</h1>

    @foreach($trips as $trip)
        <div>
            <p>Date: {{ $trip->date }}</p>
            <p>Locations: {{ implode(', ', $trip->locations->pluck('name')->toArray()) }}</p>
            <a href="{{ route('trips.show', $trip->id) }}">View Seats</a>
        </div>
    @endforeach
@endsection
