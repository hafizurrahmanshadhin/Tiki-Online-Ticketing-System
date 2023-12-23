<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\Location;
use Illuminate\Http\Request;

class TripController extends Controller {
    public function create() {
        $locations = Location::all();
        return view('trips.create', compact('locations'));
    }

    public function store(Request $request) {
        // Validation logic here

        $trip = Trip::create([
            'date' => $request->input('date'),
        ]);

        $trip->locations()->attach($request->input('locations'));

        return redirect()->route('trips.index')->with('success', 'Trip created successfully!');
    }
}
