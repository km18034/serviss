@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="col-md-6 mx-auto">  
            <div class="d-flex align-items-center">
                <a href="{{ route('profile-index') }}" class="me-3 action-btn">Back</a>
                <h1>Edit Profile</h1>
            </div>
            <form action="{{ route('update-profile', ['id' => $customer->id]) }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group my-2">
                    <label>Name</label>
                    <input type="text" class="form-control" placeholder="Enter name" name="name" value="{{ $customer->name }}">
                </div>
                <div class="form-group my-2">
                    <label>Surname</label>
                    <input type="text" class="form-control" placeholder="Enter surname" name="surname" value="{{ $customer->surname }}">
                </div>
                <div class="form-group my-2">
                    <label>Email</label>
                    <input type="email" class="form-control" placeholder="Enter email" name="email" value="{{ $customer->email }}">
                </div>
                <div class="form-group my-2">
                    <label>Phone</label>
                    <input type="text" class="form-control" placeholder="Enter phone" name="phone" value="{{ $customer->phone }}">
                </div>
                <div class="form-group my-2">
                    <label>Password</label>
                    <input type="password" class="form-control" placeholder="Password" name="password">
                </div>
                <button type="submit" class="btn btn-primary my-3">Save</button>
            </form>
        </div>
    </div>
@stop