<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlaceholderController;

Route::get('/', [PlaceholderController::class, 'index']);
Route::get('/placeholder/{id}', [PlaceholderController::class, 'show'])->name('posts.show');


Route::get('/home', function () {
    return view('welcome');
});
