@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="col-12 col-lg-6 mx-auto text-center">
        <div class="card">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Duluth 2021 Scavenger Hunt</th>
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
                        {{-- @if (in_array(Auth::id(), $task->taskCompletes->pluck('user_id')->toArray())) --}}
                        @if ($task->getIsCompletedByUser(Auth::id()))
                            <i class="fas fa-check"></i>
                        @endif
                    @endauth
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div>

        </div>
        <h2>Rules</h2>

        <ul>
            <li>No sharing pictures (take you own)! </li>
            <li>You can replace photos, the most recent will be shown </li>
        </ul>
    </div>   
</div>


@endsection
