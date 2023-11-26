@extends('layouts.admin-master')
@section('content')
    <div class="container">
        <div class="d-flex align-items-center">
            <a href="{{ route('admin-cars-index') }}" class="me-3 action-btn">Back</a>
            <h1>Auto Brands</h1>
            <a href="{{ route('admin-add-brand-form-index') }}" class="ms-3 action-btn {{ $admin_user->role === 'mechanic' ? 'disabled' : '' }}" >Add New Auto Brand</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Action</th>
                    <th scope="col">Title</th>
                    <th scope="col">Is Public</th>
                </tr>
            </thead>
            <tbody>
            @foreach($auto_brands as $auto_brand)
                <tr>
                    <th scope="row">{{ $auto_brand->id }}</th>
                    <td><a href="{{ route('admin-auto-brands-edit-index', ['id' => $auto_brand->id]) }}" class="btn btn-primary {{ $admin_user->role === 'mechanic' ? 'disabled' : '' }}">Edit</a></td>
                    <td>{{ $auto_brand->title }}</td>
                    <td>{{ $auto_brand->is_public }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop