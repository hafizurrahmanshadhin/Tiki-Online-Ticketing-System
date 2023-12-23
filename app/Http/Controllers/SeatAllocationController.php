<?php

namespace App\Http\Controllers;

use App\Models\SeatAllocation;
use App\Models\Trip;
use Illuminate\Http\Request;

class SeatAllocationController extends Controller {
    public function create(Trip $trip) {
        $availableSeats = $trip->getAvailableSeats();
        return view('seat_allocations.create', compact('trip', 'availableSeats'));
    }

    public function store(Request $request, Trip $trip) {
        // Validation logic here

        $user           = auth()->user(); // Assuming authentication is used
        $seatAllocation = SeatAllocation::create([
            'user_id'     => $user->id,
            'trip_id'     => $trip->id,
            'seat_number' => $request->input('seat_number'),
        ]);

        return redirect()->route('trips.index')->with('success', 'Seat booked successfully!');
    }
}
