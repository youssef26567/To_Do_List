<?php

use App\Http\Controllers\TaskController;
use App\Models\Task;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('task', [TaskController::class, 'index'])->name('tasks.index');
Route::get('task/create', [TaskController::class, 'create'])->name('tasks.create');
Route::post('task', [TaskController::class, 'store'])->name('tasks.store');
Route::get('task/{task}',[TaskController::class,'show'])->name('tasks.show');
Route::delete('task/{task}',[TaskController::class,'destroy'])->name('tasks.destroy');
Route::get('task/edit/{task}',[TaskController::class,'edit'])->name('tasks.edit');
Route::put('task/{task}',[TaskController::class,'update'])->name('tasks.update');
Route::get('task/search', [TaskController::class, 'indexsearch'])->name('tasks.indexsearch');
Route::post('task/search', [TaskController::class, 'search'])->name('tasks.search');

