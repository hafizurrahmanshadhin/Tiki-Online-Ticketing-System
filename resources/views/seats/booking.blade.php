@extends('layouts.app')

@section('content')
    <h1>Book a Seat for {{ $trip->destination }}</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="post" action="{{ route('book-seat.store', $trip) }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="mb-3">
            <label for="seat" class="form-label">Select Seat</label>
            <select class="form-select" id="seat" name="seat" required>
                <option value="1">Seat 1</option>
                <option value="2">Seat 2</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Book Seat</button>
    </form>
@endsection
