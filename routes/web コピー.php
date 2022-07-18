<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::get('/', [TodoController::class, 'index']);
Route::post('/', [TodoController::class, 'create']);
Route::get('/todo/create', [TodoController::class, 'update']);
Route::post('/todo/create', [TodoController::class, 'update']);
Route::post('/todo/update', [TodoController::class, 'update']);
Route::post('/todo/delete', [TodoController::class, 'remove']);