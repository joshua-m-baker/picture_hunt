@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row">
            @foreach ($tasks as $task)
                <div class="col-12 col-md-4 col-lg-3 mb-4">
                    <div class="card mx-auto text-center">

                        <img class="card-img-top img-responsive" src="{{asset($task->image_path ?? 'storage/S2kSw7x6rrBlWzsYybbDlnIK7qVMm7lv4IYoPJyz.png')}}">

                        <div class="card-body">
                            <h2 class="card-title">{{$task->task->description}}</h2>
                            <p><small>{{$task->user->name}}</small></p> 
                        </div>
                    </div>
                </div>   
            @endforeach
        </div>
    </div>
@endsection