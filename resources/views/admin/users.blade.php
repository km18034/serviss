@extends('layouts.admin-master')
@section('content')
    <div class="container">
        @if (session('success')) 
            <h6 class="alert alert-success">{{ session('success') }}</h6>
        @endif
        <div class="d-flex align-items-center">
            <h1>Users</h1>
            <a href="{{ route('admin-user-add-index') }}" class="ms-3 action-btn {{ $admin_user->role === 'mechanic' ? 'disabled' : '' }}">Add User</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Action</th>
                    <th scope="col">Name</th>
                    <th scope="col">Surname</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Role</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td><a href="{{ route('admin-edit-user', ['id' => $user->id]) }}" class="btn btn-primary {{ $admin_user->role === 'mechanic' ? 'disabled' : '' }}">Edit</a></td>
                    <td>{{ $user->name}}</td>
                    <td>{{ $user->surname }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone}}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <form action="{{ route('admin-delete-user', ['id' => $user->id]) }}" method="POST">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger" @disabled($admin_user->role === 'mechanic')>Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop