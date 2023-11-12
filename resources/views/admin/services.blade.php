@extends('layouts.admin-master')
@section('content')
    <div class="container">
        @if (session('success')) 
            <h6 class="alert alert-success">{{ session('success') }}</h6>
        @endif 
        <div class="d-flex align-items-center">
            <h1>Services</h1>
            <a href="{{ route('admin-add-form-index-service') }}" class="ms-3 action-btn {{ $admin_user->role === 'mechanic' ? 'disabled' : '' }}">Add New Service</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Action</th>
                    <th scope="col">Image</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Is Public</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            @foreach($services as $service)
                <tr>
                    <th scope="row">{{ $service->id }}</th>
                    <td><a href="{{ route('admin-edit-service', ['id' => $service->id]) }}" class="btn btn-primary {{ $admin_user->role === 'mechanic' ? 'disabled' : '' }}">Edit</a></td>
                    <td><img height="50" src="{{ asset('/storage/images/' . $service->image_name) }}" alt="img"></td>
                    <td>{{ $service->title }}</td>
                    <td>{{ $service->description }}</td>
                    <td>{{ $service->is_public }}</td>
                    <td>
                        <form action="{{ route('admin-delete-service', ['id' => $service->id]) }}" method="POST">
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