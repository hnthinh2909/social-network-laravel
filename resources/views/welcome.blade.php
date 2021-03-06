@extends('layouts.master')

@section('title')
    Welcome!
@endsection

@section('content')
    @include('includes.message-block')
    <div class="row">
        <div class="col-md-6">
            <h3>Sign Up</h3>
            <form action={{route('signup')}} method="POST">
                <div class="form-group">
                    <label for="email">Your E-Mail</label>
                    <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{Request::old('email')}}" >
                </div>
                <div class="form-group">
                    <label for="first_name">Your First Name</label>
                    <input class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" type="text" name="first_name" id="first_name" value="{{ Request::old('fist_name')}}">
                </div>
                <div class="form-group">
                    <label for="password">Your Password</label>
                    <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password" value="{{ Request::old('password')}}">
                </div>
                <button class="btn btn-primary" type="submit">Submit</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
        <div class="col-md-6">
            <h3>Sign In</h3>
            <form action="{{route('signin')}}" method="POST">
                <div class="form-group">
                    <label for="email">Your E-Mail</label>
                    <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ Request::old('email')}}">
                </div>
                <div class="form-group">
                    <label for="password">Your Password</label>
                    <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password" value="{{ Request::old('password')}}">
                </div>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>
@endsection
