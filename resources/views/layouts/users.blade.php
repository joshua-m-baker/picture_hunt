@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row">
            @foreach ($users as $user)
                <div class="col-12 col-md-4 col-lg-3 mb-4">
                    <a href="/users/{{$user->id}}">
                    
                    <div class="card mx-auto text-center">
                        <div class="card-body">
                            <h2 class="card-title">{{$user->name}}</h2>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: {{$user->getTaskPercentage()}}%;" aria-valuenow="{{$user->getTaskPercentage()}}" aria-valuemin="0" aria-valuemax="100">{{$user->getTaskCompleteCount()}} / {{$user->tasks->count()}}</div>
                                </div>
                        </div>
                    </div>
                    </a>
                </div>   
            @endforeach
        </div>
    </div>
@endsection
        
        
        
