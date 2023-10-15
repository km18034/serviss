@extends('layouts.master')
@section('content')
    <div class="container">
        @if (session('success')) 
            <h6 class="alert alert-success">{{ session('success') }}</h6>
        @endif
        <div class="d-flex align-items-center">
            <h1>Applications list</h1>
            <a href="{{ route('create-application') }}" class="ms-3 action-btn">Create New Application</a>
        </div>
        @if (!empty($applications))
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Auto Brand</th>
                    <th scope="col">Description</th>
                    <th scope="col">Date</th>
                    <th scope="col">Status</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($applications as $application)
                <tr>
                    <th scope="row">{{ $application->id }}</th>
                    <td>{{ $application->auto_brand }}</td>
                    <td>{{ $application->description }}</td>
                    <td>{{ $application->date }}</td>
                    <td>{{ $application->status }}</td>
                    <td>
                        <form action="{{ route('delete-application', ['id' => $application->id]) }}" method="POST">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-link">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <h4>You Do Not Have Any Applications Yet!</h4>
        @endif
    </div>
@stop