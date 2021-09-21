<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\TaskComplete;

class TaskCompleteController extends Controller
{
    //
    public function index()
    {
        return view('layouts.userTasks', ["tasks" => TaskComplete::All()]);
    }

    public function show($id)
    {
        return view('layouts.userTask', ["tasks" => TaskComplete::All(), "task_id" => $id]);
    }
}
