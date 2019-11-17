@extends('layouts.admin')

@section('content')

    <h1>Categories</h1>

    <div class="col-sm-6">
        <form method="post" action="{{route('admin.categories.update', $categories->id)}}" enctype="multipart/form-data" >
        {{csrf_field()}} <!-- This makes a token for the form -->
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Update Category</button>
        </form>
    </div>

    <div class="col-sm-6">

    </div>

@endsection