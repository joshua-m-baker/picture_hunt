@extends('layouts.app')

@section('content')

    <!-- if validation in the controller fails, show the errors -->
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
    Test 

    testing
    {{-- <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
            <!-- Add CSRF Token -->
            @csrf
        <div class="form-group">
            <label>Product Name</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="form-group">
            <input type="file" name="file" required>
        </div>
        <button type="submit">Submit</button>
    </form> --}}

@endsection