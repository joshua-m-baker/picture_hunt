@extends('layouts.app')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif
    
    <div class="container-fluid">
        <div class="card mx-auto col-12 col-lg-6 my-2">

            <div class="card-body text-center mx-auto ">


                <div class="row">
                <h2 class="card-title">
                @if ($main_task->id > 1)
                    <a href="{{route('task_cards', $main_task->id-1)}}"><i class="fas fa-arrow-left"></i></a>                   
                @endif

                {{$main_task->description}}

                @if ($main_task->id < $task_count)
                    <a href="{{route('task_cards', $main_task->id+1)}} "><i class="fas fa-arrow-right"></i></a>                   
                @endif
                </h2>
                </div>

                <div class="row">

                    <small>{{$main_task->helper_text}}</small>
                </div>

            </div>
        </div>

        <div class="row">
            @foreach ($main_task->taskCompletes as $task)
                <div class="col-12 col-md-4 col-lg-3 mb-4">
                    <div class="card mx-auto text-center" id={{"task".$task->task->id}}>

                        <img class="card-img-top" src="{{asset($task->image_path ?? 'storage/S2kSw7x6rrBlWzsYybbDlnIK7qVMm7lv4IYoPJyz.png')}}">

                        <div class="card-body">
                            {{-- <h2 class="card-title">{{$task->user->name}}</h2> --}}
                            <h2 class="card-title">{{$task->user->first_name}}</h2>

                            @auth
                                @if ($task->user->id == Auth::id())
                                    <form action="{{ route('image.upload.post') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input class="form-control" type="file" name="image" onchange="this.form.submit()" /> 
                                    <input type="hidden" name="task_id" value="{{$task->task->id}}" readonly>
                                    </form>
                                    
                                    <form action="{{ route('image.rotate.post') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="task_complete_id" value="{{$task->id}}" readonly>
                                    <input class="btn btn-primary" type="submit" value="Rotate">
                                    </form>
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>   
            @endforeach
        </div>
@endsection