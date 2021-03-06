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
    <div class="card mx-auto col-10 col-lg-6 my-5">
        <div class="card-body text-center">
            <h2 class="card-title">{{$user->name}}</h2>
            <div class="d-flex justify-content-center">
                <div class="progress w-75">
                    <div class="progress-bar justify-content-center" role="progressbar" style="width: {{$user->getTaskPercentage()}}%;" aria-valuenow="{{$user->getTaskPercentage()}}" aria-valuemin="0" aria-valuemax="100">{{$user->getTaskCompleteCount()}} / {{$user->tasks->count()}}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
    
            @foreach ($user->tasks as $task)
                <div class="col-12 col-md-4 col-lg-3 mb-4">
                    <div class="card mx-auto text-center" id={{"task".$task->task->id}}>

                        <img class="card-img-top" src="{{asset($task->image_path ?? 'storage/S2kSw7x6rrBlWzsYybbDlnIK7qVMm7lv4IYoPJyz.png')}}">
                        @if ($user->id == Auth::id() && $task->image_path)
                        <div class="card-img-overlay">
                            <form action="{{ route('image.rotate.post') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="task_complete_id" value="{{$task->id}}" readonly>
                            {{-- <input class="btn btn-primary w-100" type="submit" value="Rotate"> --}}
                            <button class="btn btn-outline-light float-end" type="submit"><i class="fa fa-sync"></i></button>
                        </form>
                        </div>
                        
                        @endif

                        <div class="card-body">
                            <h2 class="card-title">{{$task->task->description}}</h2>
                            <small>{{$task->task->helper_text}}</small>
                            @if ($user->id == Auth::id())
                                <form action="{{ route('image.upload.post') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input class="form-control" type="file" name="image" onchange="this.form.submit()" /> 
                                <input type="hidden" name="task_id" value="{{$task->task->id}}" readonly>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>   
            @endforeach
        </div>
    </div>
@endsection