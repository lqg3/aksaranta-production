<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\VirtualTourController;
use App\Http\Controllers\AboutController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/virtual', [VirtualTourController::class, 'index']);
Route::get('/virtual/danautoba', [VirtualTourController::class, 'danautoba']);
Route::get('/virtual/airterjunPiso', [VirtualTourController::class, 'airterjunPiso']);
Route::get('/virtual/bukitHolbung', [VirtualTourController::class, 'bukitHolbung']);
Route::get('/virtual/sibeabea', [VirtualTourController::class, 'sibeabea']);
Route::get('/virtual/tamanAlamLubini', [VirtualTourController::class, 'tamanAlamLubini']);
Route::get('/virtual/arrasyid', [VirtualTourController::class, 'arrasyid']);
Route::get('/virtual/grahaBunda', [VirtualTourController::class, 'grahaBunda']);
Route::get('/virtual/funland', [VirtualTourController::class, 'funland']);


Route::get('/about', [AboutController::class, 'index']);
Route::get('/about/aksaranta', [AboutController::class, 'aksaranta']);
Route::get('/about/history', [AboutController::class, 'history']);
Route::get('/about/kamus', [AboutController::class, 'kamus']);
Route::get('/about/kamusAksara', [AboutController::class, 'kamusAksara']);

