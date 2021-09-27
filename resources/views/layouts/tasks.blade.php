@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-4 col-lg-3 mb-4">
                <div class="card mx-auto text-center">

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
                                {{-- <a href={{"/my-tasks/#task".$task->id}}>
                                    {{$task->description}}
                                </a> --}}
                                <a href={{route('show_tasks', $task->id)}}>
                                    {{$task->description}}
                                </a>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>   
        </div>
@endsection