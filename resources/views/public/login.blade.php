@extends('layouts.master')
@section('content')
    <div class="container">  
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
        <form action="/submit-login" method="POST">
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
        <a href="/register">Register</a>
    </div>
@stop