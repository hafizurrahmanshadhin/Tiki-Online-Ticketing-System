<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripsTable extends Migration {
    public function up() {
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->timestamps();
        });

        Schema::create('location_trip', function (Blueprint $table) {
            $table->foreignId('location_id')->constrained();
            $table->foreignId('trip_id')->constrained();
        });
    }

    public function down() {
        Schema::dropIfExists('trips');
        Schema::dropIfExists('location_trip');
    }
}
