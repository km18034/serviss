@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="d-flex align-items-center">
            <h1>Applications list</h1>
            <a href="/create-application" class="ms-3 action-btn">Create New Application</a>
        </div>
        
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
                        <form action="/delete-application/{{$application->id}}" method="POST">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-link">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop