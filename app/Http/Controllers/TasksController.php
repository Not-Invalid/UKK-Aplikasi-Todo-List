<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index()
    {
        return view('tasks.index')->with('title', 'Tasks');
    }

    public function create()
    {
        return view('tasks.create')->with('title', 'Create Tasks');
    }

    public function edit()
    {
        return view('tasks.edit')->with('title', 'Edit Tasks');
    }
}
