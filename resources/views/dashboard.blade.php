@extends('layouts.master')

@section('content')
    <section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
            <header>
                <h3>What do you have to say?</h3>
                <form action="">
                    <div class="form-group">
                        <textarea class="form-control" name="new-post" id="new-post" cols="30" rows="10" placeholder="Type something"></textarea>
                    </div>
                    <button class="btn btn-primary">Create Post</button>
                </form>
            </header>
        </div>
    </section>
    <section class="row posts">
        <div class="col-md-6 col-md-offset-3">
            <header>
                <h3>What other people say...</h3>
                <article class="post">
                    <p> Lorem Lorem Lorem LoremLoremLoremLoremLoremLoremLoremLoremLoremLorem </p>
                    <div class="info">Posted by Max on 12 Feb 2019</div>
                    <div class="interaction">
                        <a href="#">Like</a> |
                        <a href="#">Dislike</a> |
                        <a href="#">Edit</a> |
                        <a href="#">Delete</a>
                    </div>
                </article>
                <article class="post">
                    <p> Lorem Lorem Lorem LoremLoremLoremLoremLoremLoremLoremLoremLoremLorem </p>
                    <div class="info">Posted by Max on 12 Feb 2019</div>
                    <div class="interaction">
                        <a href="#">Like</a> |
                        <a href="#">Dislike</a> |
                        <a href="#">Edit</a> |
                        <a href="#">Delete</a>
                    </div>
                </article>
            </header>
        </div>
    </section>
@endsection
