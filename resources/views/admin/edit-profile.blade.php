@extends('layouts.admin-master')
@section('content')
    <div class="container">
        <div class="col-md-6 mx-auto">  
            <div class="d-flex align-items-center">
                <a href="{{ route('admin-profile-index') }}" class="me-3 action-btn">Back</a>
                <h1>Edit Profile</h1>
            </div>
            <form action="{{ route('admin-submit-edit-profile', ['id' => $admin_user->id]) }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group my-2">
                    <label>Name</label>
                    <input type="text" class="form-control" placeholder="Enter name" name="name" value="{{ $admin_user->name }}">
                </div>
                <div class="form-group my-2">
                    <label>Surname</label>
                    <input type="text" class="form-control" placeholder="Enter surname" name="surname" value="{{ $admin_user->surname }}">
                </div>
                <div class="form-group my-2">
                    <label>Email</label>
                    <input type="email" class="form-control" placeholder="Enter email" name="email" value="{{ $admin_user->email }}">
                </div>
                <div class="form-group my-2">
                    <label>Phone</label>
                    <input type="text" class="form-control" placeholder="Enter phone" name="phone" value="{{ $admin_user->phone }}">
                </div>
                <div class="form-group my-2">
                    <label>Password</label>
                    <input type="password" class="form-control" placeholder="Password" name="password">
                </div>
                <div class="form-group my-2">
                    <label>Role</label>
                    <select class="form-select" name="role" @disabled($admin_user->role === 'mechanic')>
                        <option value="admin" @selected("admin" === $admin_user->role)>Admin</option>
                        <option value="mechanic" @selected("mechanic" === $admin_user->role)>Mechanic</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary my-3">Save</button>
            </form>
        </div>
    </div>
@stop