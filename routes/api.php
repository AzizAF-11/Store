<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UlasanController;
use App\Http\Controllers\Api\UserController;

Route::get('/users-data', [UserController::class, 'getUsersData']);
Route::get('/check-user/{id}', [UserController::class, 'checkUser']);

Route::get('/ulasan', [UlasanController::class, 'index']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
