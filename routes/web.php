<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScreeningController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/screening', function () {
    return view('subject_screening');
});

Route::post('/screening', [ScreeningController::class, 'screening']);

Route::get('/screenings', [ScreeningController::class, 'getAll']);