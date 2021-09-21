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

    @if ($message = Session::get('success'))

        <div class="alert alert-success alert-block">

            <button type="button" class="close" data-dismiss="alert">×</button>

                <strong>{{ $message }}</strong>

        </div>

        <img src="images/{{ Session::get('image') }}">

        @endif

    

        @if (count($errors) > 0)

            <div class="alert alert-danger">

                <strong>Whoops!</strong> There were some problems with your input.

                <ul>

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif
   
    <form action="{{ route('image.upload.post') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <input type="file" name="image" class="form-control">
                <input type="hidden" name="task_id" value="1">
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-success">Upload</button>
            </div>
        </div>
    </form>

@endsection