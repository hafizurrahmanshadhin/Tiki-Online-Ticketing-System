<?php

namespace App\Http\Controllers;

use App\Models\SeatAllocation;
use App\Models\Trip;
use Illuminate\Http\Request;

class SeatBookingController extends Controller {
    public function showBookingForm(Trip $trip) {
        $totalSeats  = 36;
        $bookedSeats = SeatAllocation::where('trip_id', $trip->id)->pluck('seat_number')->toArray();

        return view('seats.booking', compact('trip', 'totalSeats', 'bookedSeats'));
    }

    public function bookSeat(Request $request, Trip $trip) {
        $request->validate([
            'name'  => 'required|string',
            'email' => 'required|email',
            'seat'  => 'required|numeric|between:1,36', // Assuming seats are numbered from 1 to 36
        ]);
        $isSeatAvailable = !SeatAllocation::where('trip_id', $trip->id)->where('seat_number', $request->seat)->exists();

        if (!$isSeatAvailable) {
            return redirect()->back()->with('error', 'Selected seat is already booked. Please choose another seat.');
        }
        SeatAllocation::create([
            'trip_id'     => $trip->id,
            'seat_number' => $request->seat,
            'user_name'   => $request->name,
            'user_email'  => $request->email,
        ]);

        return redirect()->route('booking-confirmation')->with('success', 'Seat booked successfully!');
    }
}
