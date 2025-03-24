<?php

use App\Http\Controllers\Todo\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/todos', [TodoController::class, 'index'])->name('todos');
Route::post('/todos', [TodoController::class, 'store'])->name('todos.store');