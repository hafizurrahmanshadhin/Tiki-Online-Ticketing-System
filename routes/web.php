<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TripController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\SeatAllocationController;

Route::resource('/locations', LocationController::class);
Route::resource('/trips', TripController::class);
Route::resource('/seat-allocations', SeatAllocationController::class);
Route::get('/book-seat/{trip}', 'SeatBookingController@showBookingForm')->name('book-seat');
Route::post('/book-seat/{trip}', 'SeatBookingController@bookSeat')->name('book-seat.store');
