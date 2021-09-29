@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="col-12 col-lg-6 mx-auto text-center">
        <div class="card my-2">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Duluth 2021 Picture Hunt</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                    <tr>
                    <td>
                    <a href={{route('task_cards', $task->id)}}>
                        {{$task->description}} {{$task->helper_text}}
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

        <div class="card my-2">
            <h2 class="card-title">Notes</h2>

            <ul>
                <li>Take your own pictures! </li>
                <li>You can replace photos if you have a better one, but old ones get deleted</li>
                <li>Uploaded photos get compressed, so keep the originals</li>
            </ul>
        </div>

        <div class="card my-2">
            <h2 class="card-title">Links</h2>
                <a class="btn btn-primary w-50 mx-auto my-2" role="button" href="https://open.spotify.com/playlist/7xUeC7Ep83fvQbabQLvYjw">
                    <i class="fab fa-spotify"></i> Bops
                </a>
                <a class="btn btn-primary w-50 mx-auto my-2" role="button" href="https://docs.google.com/document/d/1_dbUArNm20BJJQJWJ5zt9O2ZSynt3PxFzckpOUex6Ys/edit">
                    <i class="fas fa-file-word"></i> Itinerary
                </a>
                <a class="btn btn-primary w-50 mx-auto my-2" role="button" href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">
                    <i class="fas fa-utensils"></i> Food
                </a>

        </div>
    </div>   

</div>


@endsection
