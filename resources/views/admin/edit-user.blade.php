@extends('layouts.admin-master')
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
    <div class="col-md-6 mx-auto">    
        <div class="d-flex align-items-center">
            <a href="{{ route('admin-users-index') }}" class="me-3 action-btn">Back</a>
            <h1>Edit Service</h1>
        </div>
        <form action="{{ route('admin-submit-edit-user', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group my-2">
                    <label>Name</label>
                    <input type="text" class="form-control" placeholder="Enter Name" name="name" value="{{ $user->name }}">
                </div>
                <div class="form-group my-2">
                    <label>Surname</label>
                    <input type="text" class="form-control" placeholder="Enter Surname" name="surname" value="{{ $user->surname }}">
                </div>
                <div class="form-group my-2">
                    <label>Email</label>
                    <input type="text" class="form-control" placeholder="Enter Email" name="email" value="{{ $user->email }}">
                </div>
                <div class="form-group my-2">
                    <label>Phone</label>
                    <input type="text" class="form-control" placeholder="Enter Phone Number" name="phone" value="{{ $user->phone }}">
                </div>
                <div class="form-group my-2">
                    <label>Password</label>
                    <input type="password" class="form-control" placeholder="Enter Password" name="password">
                </div>
                <div class="form-group my-2">
                    <label>Role</label>
                    <select class="form-select" name="role">
                        <option value="admin">Admin</option>
                        <option selected value="mechanic">Mechanic</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary my-3">Submit</button>
            </form>
    </div>
    </div>
@stop