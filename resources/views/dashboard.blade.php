@extends('layouts.master')

@section('content')
    @include('includes.message-block')
    <section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
            <header>
                <h3>What do you have to say?</h3>
                <form action="{{route('post.create')}}" method="POST">
                    <div class="form-group">
                        <textarea class="form-control" name="body" id="new-post" cols="30" rows="10" placeholder="Type something"></textarea>
                    </div>
                    <button class="btn btn-primary">Create Post</button>
                    <input type="hidden" value="{{ Session::token() }}" name="_token">
                </form>
            </header>
        </div>
    </section>
    <section class="row posts">
        <div class="col-md-6 col-md-offset-3">
            <header>
                <h3>What other people say...</h3>
                @foreach($posts as $post)
                    <article class="post" data-postid="{{ $post->id }}">
                        <p> {{ $post['body'] }} </p>
                        <div class="info">Posted by {{ $post->user->first_name }} on {{ $post['created_at'] }}</div>
                        <div class="interaction">
                            <a href="#" class="like">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where
                            ('post_id', $post->id)->first()->like == 1 ? 'You like this post' : 'Like' : 'Like'  }}</a> |
                            <a href="#" class="like">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where
                            ('post_id', $post->id)->first()->like == 0 ? 'You don\'t like this post' : 'Dislike' : 'Dislike'  }}</a> |
                            @if(Auth::user() == $post->user)
                                <a href="#" class="edit">Edit</a> |
                                <a href="{{ route('post.delete', ['post_id' => $post['id']]) }}">Delete</a>
                            @endif
                        </div>
                    </article>
                @endforeach

            </header>
        </div>
    </section>
    <div id="edit-modal" class="modal fade" role="dialog">
        <div class="modal-dialog" >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="form-group">
                            <label for="post-body">Edit the Post</label>
                            <textarea class="post-body" name="post-body" id="post-body" rows="5" cols="49"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="modal-save">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        var token = "{{ Session::token() }}";
        var urlEdit = "{{ route('edit') }}";
        var urlLike = "{{ route('like') }}"
    </script>
@endsection
