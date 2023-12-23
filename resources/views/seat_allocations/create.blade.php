@extends('layouts.app')

@section('content')
    <h1>Book a Seat</h1>

    <form method="post" action="{{ route('seat-allocations.store', $trip->id) }}">
        @csrf
        <label for="seat_number">Select Seat Number:</label>
        <select name="seat_number" required>
            @foreach($availableSeats as $seat)
                <option value="{{ $seat->seat_number }}">{{ $seat->seat_number }}</option>
            @endforeach
        </select>

        <button type="submit">Book Seat</button>
    </form>
@endsection
