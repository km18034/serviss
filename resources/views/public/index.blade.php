@extends('layouts.master')
@section('content')

    <div class="container">  
        <h1>Registration</h1>

        <form action="/register" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label>Surname</label>
                <input type="text" class="form-control" placeholder="Enter surname">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="text" class="form-control" placeholder="Enter phone">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>

        <h2>LOGIN</h2>

        <form action="/login" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
@stop