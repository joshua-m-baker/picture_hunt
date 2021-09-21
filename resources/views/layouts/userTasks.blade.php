@extends('layouts.app')

@section('content')

    <div class="container">
    @for ($i = 0; $i < count($tasks); $i+=3)
    {{-- @foreach ($tasks as $task) --}}

        <div class="row">

            @for ($j = 0; ($j < 3 && $i + $j < count($tasks));  $j++)
                <div class="col">
                    <p class="text-light bg-dark">
                        {{$tasks[$j]->task_id}}
                        {{$tasks[$j]->user_id}}
                    </p>
                    {{-- <img src="{{ asset('storage/'.$tasks[$j+1]->image_path) }}" class="img-fluid rounded" style="max-width: 25px">  --}}
                </div>
                col
   
            @endfor
           
            {{-- <div class="col">
                {{$tasks[$i]->task_id}}
                {{$tasks[$i]->user_id}}
                <img src="{{ asset('storage/'.$tasks[$i+1]->image_path) }}" class="img-fluid rounded"> 
            </div>
            <div class="col">
                {{$tasks[$i]->task_id}}
                {{$tasks[$i]->user_id}}
                <img src="{{ asset('storage/'.$tasks[$i+2]->image_path) }}" class="img-fluid rounded"> 
            </div> --}}
        </div>

        <div style="height: 50px">
            TEST

        </div>
        
    {{-- @endforeach --}}
    @endfor
    </div>

@endsection