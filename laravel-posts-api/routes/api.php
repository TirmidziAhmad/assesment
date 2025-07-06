<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController; // Import the PostController

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route for authenticated user details (example, not directly related to posts)
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// API resource routes for PostController
// This single line defines all standard CRUD routes:
// GET    /api/posts          -> PostController@index   (for listing posts with pagination)
// POST   /api/posts          -> PostController@store   (for creating a new post)
// GET    /api/posts/{post}   -> PostController@show    (for showing a single post)
// PUT    /api/posts/{post}   -> PostController@update  (for updating a post)
// DELETE /api/posts/{post}   -> PostController@destroy (for deleting a post)
Route::apiResource('posts', PostController::class);