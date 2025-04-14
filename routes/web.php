<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return view('dashboard');
})->name('dashboard');

Route::get('tasks', function() {
    return view('tasks.index');
})->name('tasks');

Route::get('tasks/create', function() {
    return view('tasks.create');
})->name('tasks.create');

Route::get('tasks/1/edit', function() {
    return view('tasks.edit');
})->name('tasks.edit');

