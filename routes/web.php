<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RoomController;

Route::get('/', function () {
    return view('admin.dashboard');
});


// master rooms
Route::resource('rooms', RoomController::class);

