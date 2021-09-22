@extends('layouts.app')

@section('content')

    {{-- {{$tasks}}
    {{count($tasks)}} --}}
    <div class="container">
        @for ($i = 0; $i < count($tasks); $i+=3)
            <div class="row">
                @for ($j = 0; ($j < 3 && $i + $j < count($tasks));  $j++)

                    {{$tasks[$i+$j]->task->description}}

                    <form action="{{ route('image.upload.post') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col">
                            <label for="{{'fileUpload'.$tasks[$i+$j]->id}}">{{$tasks[$i+$j]->task->description}}</label>
                            <input type="file" name="image" id="{{'fileUpload'.$tasks[$i+$j]->id}}" class="form-control">
                            <input type="hidden" name="task_id" value="{{$tasks[$i+$j]->id}}">
                            <button type="submit" class="btn btn-success">Upload</button>
                        </div>
                    </form>
                @endfor
            </div>
        @endfor
    </div>
        

    {{-- <div class="container">
    @for ($i = 0; $i < count($tasks); $i+=3)

        <div class="row">
            @for ($j = 0; ($j < 3 && $i + $j < count($tasks));  $j++)
                <div class="col">
                    {{$tasks[$j+$i]->user->name}}
                    <img src="{{ asset('storage/'.$tasks[$j+$i]->image_path) }}" class="img-fluid rounded"> 
                    {{$tasks[$j+$i]->task->description}} 
                </div>
            @endfor
        </div>
        
    @endfor
    </div> --}}

@endsection