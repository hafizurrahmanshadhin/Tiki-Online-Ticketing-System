<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model {
    public function seats() {
        return $this->hasMany(SeatAllocation::class);
    }
    public function locations() {
        return $this->belongsToMany(Location::class);
    }

    public function seatAllocations() {
        return $this->hasMany(SeatAllocation::class);
    }

    public function getAvailableSeats() {
        $bookedSeats    = $this->seatAllocations->pluck('seat_number')->toArray();
        $allSeats       = range(1, 36);
        $availableSeats = array_diff($allSeats, $bookedSeats);

        return collect($availableSeats)->map(function ($seat) {
            return (object) ['seat_number' => $seat];
        });
    }

}
