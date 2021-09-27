@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="col-12 col-lg-6 mx-auto">
        <div class="card text-center">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Task</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                    <tr>
                    <td>
                    <a href={{route('task_cards', $task->id)}}>
                        {{$task->description}}
                    </a>
                    @auth
                        @if (in_array(Auth::id(), $task->taskCompletes->pluck('user_id')->toArray()))
                            <i class="fas fa-check"></i>
                        @endif
                    @endauth
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>   
</div>
@endsection