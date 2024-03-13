<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::resource('tasks',TaskController::class);
    Route::resource('projects',ProjectController::class);
    Route::get('assignUser/{task?}', [TaskController::class, 'assignUserTask'])->name('assignUser');
    Route::post('assignToUser/{task}', [TaskController::class, 'assignToTask'])->name('assignToUser');
    Route::post('taskAssignToUser', [TaskController::class, 'taskAssignToUser'])->name('taskAssignToUser');

    Route::get('assignProject/{task?}', [TaskController::class, 'assignProjectTask'])->name('assignProject');
    Route::post('assignToProject/{task}', [TaskController::class, 'assignToProject'])->name('assignToProject');
    Route::post('assignTaskToProject', [TaskController::class, 'assignTaskToProject'])->name('assignTaskToProject');


    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});