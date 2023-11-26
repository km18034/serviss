@extends('layouts.admin-master')
@section('content')
    <div class="container">  
        <div class="d-flex align-items-center">
            <h1>Cars</h1>
            <a href="{{ route('admin-auto-brands-index') }}" class="ms-3 action-btn">Auto Brand</a>
            <a href="{{ route('admin-add-model-form-index') }}" class="ms-3 action-btn {{ $admin_user->role === 'mechanic' ? 'disabled' : '' }}">Add New Auto Model</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Action</th>
                    <th scope="col">Auto Brand</th>
                    <th scope="col">Auto Model</th>
                    <th scope="col">Is Public</th>
                </tr>
            </thead>
            <tbody>
            @foreach($auto_models as $auto_model)
                <tr>
                    <th scope="row">{{ $auto_model->id }}</th>
                    <td><a href="{{ route('admin-edit-car', ['id' => $auto_model->id]) }}" class="btn btn-primary {{ $admin_user->role === 'mechanic' ? 'disabled' : '' }}">Edit</a></td>
                    <td>{{ $auto_model->brand->title }}</td>
                    <td>{{ $auto_model->title }}</td>
                    <td>{{ $auto_model->is_public }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop