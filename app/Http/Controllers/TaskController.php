<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\TaskComplete;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    //
    public function index()
    {
        return view('layouts.taskList', ["tasks" => Task::All()]);
    }

    public function gallery()
    {
        $tasks = TaskComplete::where('image_path', '!=', null)->get();
        return view('layouts.gallery', ["tasks" => $tasks]);
    }

    public function showByUser($user_id)
    {
        $user = User::find($user_id);
        return view('layouts.cardsByUser', ["user" => $user]);
    }

    public function showByTask($task_id)
    {
        $task = Task::find($task_id);
        return view('layouts.cardsByTask', ["main_task" => $task]);
    }
}
