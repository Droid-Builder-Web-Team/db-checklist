<?php

use App\Livewire\UserTodoList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth')->get('/todo-list', UserTodoList::class)->name('todo-list');
Route::middleware('auth')->prefix('/todo')->group(function () {
    Route::post('/store', [UserTodoList::class, 'store'])->name('todo.store');
    Route::put('/update/{todoItemId}', [UserTodoList::class, 'update'])->name('todo.update');
    Route::delete('/{todoItemId}', [UserTodoList::class, 'destroy'])->name('todo.destroy');
});