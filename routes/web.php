<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlaceholderController;

Route::get('/', [PlaceholderController::class, 'index']);

Route::get('/home', function () {
    return view('welcome');
});
