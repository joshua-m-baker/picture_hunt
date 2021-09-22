@extends('layouts.app')

@section('content')

    <div class="container">
    @for ($i = 0; $i < count($tasks); $i+=3)
        <div class="row">
            @for ($j = 0; ($j < 3 && $i + $j < count($tasks));  $j++)
                <div class="col">
                    {{$tasks[$j+$i]->user->name}}
                    <img src="{{ asset($tasks[$j+$i]->image_path) }}" class="img-fluid rounded"> 
                    {{$tasks[$j+$i]->task->description}}
                </div>
            @endfor
        </div>
    @endfor
    </div>

   
@endsection