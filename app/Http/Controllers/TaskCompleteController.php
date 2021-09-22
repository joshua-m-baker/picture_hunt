<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\TaskComplete;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TaskCompleteController extends Controller
{
    //
    public function index()
    {
        $tasks = TaskComplete::where('image_path', '!=', null)->get();
        return view('layouts.gallery', ["tasks" => $tasks]);
    }

    public function tasks()
    {
        $user_id = Auth::id();
        $taskCompletes = TaskComplete::where('user_id', $user_id)->get();

        return view('layouts.userTasks', ["tasks" => $taskCompletes]);
    }

    public function show($id)
    {
        return view('layouts.userTask', ["tasks" => TaskComplete::All(), "task_id" => $id]);
    }
}
