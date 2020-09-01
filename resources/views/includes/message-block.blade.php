<?php
?>
@if(count($errors) > 0)
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <ul>
                @foreach($errors-> all() as $error)
                    <li class="alert alert-danger">{{$error}}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
@if(Session::has('message'))
    <div class="row">
        <div class="col-md-4 col-md-offset-4 alert alert-success">
            {{ Session::get('message') }}
        </div>
    </div>
@endif