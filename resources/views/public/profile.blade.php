@extends('layouts.master')
@section('content')
    <div class="container">  
        @if (session('success')) 
            <h6 class="alert alert-success">{{ session('success') }}</h6>
        @endif
        <div class="d-flex align-items-center">
            <h1>Profile</h1>
            <a href="{{ route('edit-profile-index', ['id' => $customer->id]) }}" class="ms-3 action-btn">Edit Profile</a>
        </div>
        <div class="col-md-6 profile">
            <div class="row">
                <div class="col-6"><div class="label">Name</div></div>
                <div class="col-6">{{ $customer->name }}</div>
            </div>
            <div class="row">
                <div class="col-6"><div class="label">Surname</div></div>
                <div class="col-6">{{ $customer->surname }}</div>
            </div>
            <div class="row">
                <div class="col-6"><div class="label">Email</div></div>
                <div class="col-6">{{ $customer->email }}</div>
            </div>
            <div class="row">
                <div class="col-6"><div class="label">Phone</div></div>
                <div class="col-6">{{ $customer->phone }}</div>
            </div>
            <div class="row">
                <div class="col-6"><div class="label">Password</div></div>
                <div class="col-6">****</div>
            </div>
            <form action="{{ route('delete-profile', ['id' => $customer->id]) }}" method="POST">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger mt-5">Delete</button>
            </form>
        </div>
    </div>
@stop