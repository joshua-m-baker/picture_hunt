@extends('layouts.app')

@section('content')

    @foreach ($tasks as $task) 

        <div>
            {{$task->description}}
        </div>
        
    @endforeach

@endsection