@extends('layouts.master')
@section('content')
    <div class="container">
        @if (session('error')) 
            <h6 class="alert alert-danger">{{ session('error') }}</h6>
        @endif
        <div class="col-md-6 mx-auto">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h2>LOGIN</h2>
            <form action="{{ route('submit-login') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group my-2">
                    <label>Email</label>
                    <input type="email" class="form-control" placeholder="Enter email" name="email">
                </div>
                <div class="form-group my-2">
                    <label>Password</label>
                    <input type="password" class="form-control" placeholder="Password" name="password">
                </div>
                <button type="submit" class="btn btn-primary my-3">Login</button>
            </form>
            <a href="{{ route('register-index') }}">Register</a>
        </div>
    </div>
@stop