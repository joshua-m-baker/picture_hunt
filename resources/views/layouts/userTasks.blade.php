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

    <div>
        <div class="container-fluid">
            <div class="row">
        
                @foreach ($tasks as $task)
                    <div class="col-12 col-md-4 col-lg-3 mb-4">
                        <div class="card mx-auto text-center">

                            <img class="card-img-top" src="{{asset($task->image_path ?? 'storage/S2kSw7x6rrBlWzsYybbDlnIK7qVMm7lv4IYoPJyz.png')}}">

                            <div class="card-body">
                                <h2 class="card-title">{{$task->task->description}}</h2>

                                <form action="{{ route('image.upload.post') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                {{-- <input type="file" name="image" class="form-control"> --}}
                                <input class="form-control" type="file" name="image" onchange="this.form.submit()" /> 
                                <input type="hidden" name="task_id" value="{{$task->task->id}}" readonly>
                                {{-- <button type="submit" class="btn btn-success">Upload</button> --}}
                                </form>
                            </div>
                        </div>
                    </div>   
                @endforeach
            </div>
        </div>
    {{-- <div class="card-deck">
        @for ($i = 0; $i < count($tasks); $i+=3)
            <div class="row">
                @for ($j = 0; ($j < 3 && $i + $j < count($tasks));  $j++)
                    <div class="col">
                        <div class="card">
                            <img src="{{ asset($tasks[$i+$j]->image_path ?? 'storage/S2kSw7x6rrBlWzsYybbDlnIK7qVMm7lv4IYoPJyz.png') }}" class="card-img-top" class="img-fluid rounded" style="height: 20vw; width: 100%;"> 
                        
                            <div class="card-body">
                                <h5 class="card-title">{{$tasks[$j+$i]->task->description}}</h5>

                                <form action="{{ route('image.upload.post') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <label for="{{'fileUpload'.$tasks[$i+$j]->id}}">{{$tasks[$i+$j]->task->description}}</label>
                                    <input type="file" name="image" id="{{'fileUpload'.$tasks[$i+$j]->id}}" class="form-control">
                                    <input type="hidden" name="task_id" value="{{$tasks[$i+$j]->task->id}}">
                                    <button type="submit" class="btn btn-success">Upload</button>
                               </form>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        @endfor
    </div> --}}

@endsection