@extends('layouts.admin')


@section('content')


    <h1>Posts</h1>

    @if(Session::has('deleted_post'))

        <p class="alert alert-danger">{{session('deleted_post')}}</p>

    @endif

    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Owner</th>
            <th>Category</th>
            <th>Title</th>
            <th>Body</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
        </thead>
        <tbody>

        @if($posts)

            @foreach($posts as $post)
                    <td>{{$post->id}}</td>
                    <td><img height="50" src="{{$post->photo_id? $post->photo->file : 'http://placehold.it/400x400'}}"></td>
                    <td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->user->name}}</a></td>
                    <td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{str_limit($post->body,30)}}</td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                    <td><a href="{{route('home.post', $post->slug)}}">View Post</a> </td>
                    <td><a href="{{route('admin.comments.show', $post->id)}}">View Comments</a> </td>
                </tr>
            @endforeach

        @endif


        </tbody>
    </table>

    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            {{$posts->render()}}
        </div>
    </div>

@stop