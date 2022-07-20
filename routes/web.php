<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::get('/', [TodoController::class, 'index'])->middleware('auth');
Route::post('/', [TodoController::class, 'create']);
Route::get('/todo/create', [TodoController::class, 'update']);
Route::post('/todo/create', [TodoController::class, 'update']);
Route::post('/todo/update', [TodoController::class, 'update']);
Route::post('/todo/delete', [TodoController::class, 'remove']);
Route::get('/todo/find',function(){
  return view('find');
});
Route::post('/todo/search', [TodoController::class, 'search']);

Route::get('/dashboard', function () {
    return view('index');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
