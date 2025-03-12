<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TasksController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');


Route::get('tasks', [TasksController::class, 'index'])->name('tasks');
Route::get('task/create', [TasksController::class, 'create'])->name('tasks.create');
Route::get('task/1/edit',[TasksController::class, 'edit'])->name('tasks.edit');