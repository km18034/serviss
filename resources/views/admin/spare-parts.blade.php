@extends('layouts.admin-master')
@section('content')
    <div class="container">
        @if (session('success')) 
            <h6 class="alert alert-success">{{ session('success') }}</h6>
        @endif
        <div class="d-flex align-items-center">
            <h1>Spare parts</h1>
            <a href="{{ route('admin-add-form-index') }}" class="ms-3 action-btn {{ $admin_user->role === 'mechanic' ? 'disabled' : '' }}">Add New Spare Part</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Action</th>
                    <th scope="col">Image</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Auto Brand</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Is Aviable</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            @foreach($spare_parts as $part)
                <tr>
                    <th scope="row">{{ $part->id }}</th>
                    <td><a href="{{ route('admin-edit-part', ['id' => $part->id]) }}" class="btn btn-primary {{ $admin_user->role === 'mechanic' ? 'disabled' : '' }}">Edit</a></td>
                    <td><img height="50" src="{{ asset('/storage/images/' . $part->image_name) }}" alt="img"></td>
                    <td>{{ $part->title}}</td>
                    <td>{{ $part->description }}</td>
                    <td>{{ $part->auto_brand }}</td>
                    <td>{{ $part->amount }}</td>
                    <td>{{ $part->is_aviable }}</td>
                    <td>
                        <form action="{{ route('admin-delete-part', ['id' => $part->id]) }}" method="POST">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger" @disabled($admin_user->role === 'mechanic')>Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $spare_parts->links() }}
    </div>
@stop