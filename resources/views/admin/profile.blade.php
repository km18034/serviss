@extends('layouts.admin-master')
@section('content')
    <div class="container">  
        @if (session('success')) 
            <h6 class="alert alert-success">{{ session('success') }}</h6>
        @endif
        <div class="d-flex align-items-center">
            <h1>Profile</h1>
            <a href="{{ route('admin-edit-profile-index', ['id' => $admin_user->id]) }}" class="ms-3 action-btn">Edit Profile</a>
        </div>
        <div class="col-md-6 profile">
            <div class="row">
                <div class="col-6"><div class="label">Name</div></div>
                <div class="col-6">{{ $admin_user->name }}</div>
            </div>
            <div class="row">
                <div class="col-6"><div class="label">Surname</div></div>
                <div class="col-6">{{ $admin_user->surname }}</div>
            </div>
            <div class="row">
                <div class="col-6"><div class="label">Email</div></div>
                <div class="col-6">{{ $admin_user->email }}</div>
            </div>
            <div class="row">
                <div class="col-6"><div class="label">Phone</div></div>
                <div class="col-6">{{ $admin_user->phone }}</div>
            </div>
            <div class="row">
                <div class="col-6"><div class="label">Password</div></div>
                <div class="col-6">****</div>
            </div>
            <form action="{{ route('admin-delete-profile', ['id' => $admin_user->id]) }}" method="POST">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger mt-5">Delete</button>
            </form>
        </div>
    </div>
@stop