<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller {
    public function index() {
        $locations = Location::all();

        return view('locations.index', compact('locations'));
    }

    public function create() {
        return view('locations.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string',
        ]);

        Location::create($request->all());

        return redirect()->route('locations.index')->with('success', 'Location created successfully!');
    }

    public function edit($id) {
        $location = Location::findOrFail($id);

        return view('locations.edit', compact('location'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required|string',
        ]);

        $location = Location::findOrFail($id);
        $location->update($request->all());

        return redirect()->route('locations.index')->with('success', 'Location updated successfully!');
    }

    public function destroy($id) {
        $location = Location::findOrFail($id);
        $location->delete();

        return redirect()->route('locations.index')->with('success', 'Location deleted successfully!');
    }
}
