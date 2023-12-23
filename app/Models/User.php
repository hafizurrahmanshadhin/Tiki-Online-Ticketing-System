<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model {
    public function tickets() {
        return $this->hasMany(SeatAllocation::class);
    }
}
