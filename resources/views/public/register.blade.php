@extends('layouts.master')
@section('content')
    <div class="container">  
        <h1>Registration</h1>
        <form action="/submit-register" method="POST">
            {{ csrf_field() }}
            <div class="form-group my-2">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Enter name" name="name">
            </div>
            <div class="form-group my-2">
                <label>Surname</label>
                <input type="text" class="form-control" placeholder="Enter surname" name="surname">
            </div>
            <div class="form-group my-2">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="Enter email" name="email">
            </div>
            <div class="form-group my-2">
                <label>Phone</label>
                <input type="text" class="form-control" placeholder="Enter phone" name="phone">
            </div>
            <div class="form-group my-2">
                <label>Password</label>
                <input type="password" class="form-control" placeholder="Password" name="password">
            </div>
            <button type="submit" class="btn btn-primary my-3">Register</button>
        </form>
        <a href="/login">Login</a>
    </div>
@stop