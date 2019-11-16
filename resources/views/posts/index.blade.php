@extends('layouts.app')

@section ('content')

    <div class="container">
        <h1>All Posts</h1>
        <div class="row">
            @foreach($posts as $post)

                <div class="card col-6">
                    <div class="card-body">
                        <h4 class="card-title">{{$post->title}}</h4>
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="{{$post->youtube_url}}" width="560" height="315" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <p class="card-text">{{$post->body}}</p>
                        <p>Posted at: {{$post->created_at}}</p>
                        <p>By: {{$post->user->name}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
