<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RoomController;

Route::get('/', function () {
    return view('admin.dashboard');
});


// master ruangan
Route::resource('ruangan', RoomController::class);

