<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


//Register Users
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth:sanctum');

//Post 
Route::get('/posts', [PostController::class, 'index']); // Fetch all posts
Route::post('/posts', [PostController::class, 'store'])->middleware('auth:sanctum'); // Create a new post
Route::get('/posts/{id}', [PostController::class, 'show']); // Fetch a single post by ID
Route::put('/posts/{id}', [PostController::class, 'update'])->middleware('auth:sanctum'); // Update a post by ID
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->middleware('auth:sanctum'); // Delete a post by ID
Route::get('/posts/search/{name}', [PostController::class, 'search']); // Search for posts by name

