@extends('layouts.app')

@section ('content')

    <div class="container">

        @include('flash-message')

        <h1>All Posts</h1>
        <div class="row">
            @foreach($posts as $post)
                <div class="card col-6">
                    <div class="card-body">
                        @if (!Auth::guest())
                            <favorite curuser="{{Auth::id()}}"></favorite>
                        @endif
                        <h4 class="card-title">{{$post->title}}</h4>
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item"
                                    src="https://www.youtube.com/embed/{{$post->youtube_id}}" width="560" height="315"
                                    frameborder="0" allowfullscreen></iframe>
                        </div>
                        <p class="card-text">{{$post->body}}</p>
                        <p>Posted at: {{$post->created_at}}</p>
                        <p>By: {{$post->user->name}}</p>
                    </div>
                @if(!Auth::guest() && Auth::user()->hasRole('post admin'))
                    <!-- Button to Open the Modal -->
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">
                            Delete Post
                        </button>

                        <!-- The Modal -->
                        <div class="modal" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Confirm Delete?</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        Are you sure you want to delete this post?
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <form method="POST" action="/posts/delete/{{$post->id}}">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-primary">Confirm</button>
                                        </form>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endsection
