<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\TaskComplete;

class TaskController extends Controller
{
    //
    public function index()
    {
        return view('layouts.tasks', ["tasks" => Task::All()]);
    }

    public function show($task_id)
    {
        $task = Task::find($task_id)->first();
        return view('layouts.cardsByTask', ["main_task" => $task]);
    }
}
