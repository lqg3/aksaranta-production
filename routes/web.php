<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\VirtualTourController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/culture', function () {
    return view('culture');
});

Route::get('/virtual', [VirtualTourController::class, 'index']);
