<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/', [TodoController::class, 'index'])->name('todos.index');
Route::post('/', [TodoController::class, 'store'])->name('todos.store');
Route::delete('/{todo}', [TodoController::class, 'destroy'])->name('todos.destroy');
Route::resource('todos', TodoController::class);
Route::post('todos/{id}/status', [TodoController::class, 'updateStatus'])->name('todos.updateStatus');