@extends('layouts.admin-master')
@section('content')
    <div class="container">
        <h1>History</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Date</th>
                    <th scope="col">Mechanic</th>
                    <th scope="col">Action</th>
                    <th scope="col">Application</th>
                </tr>
            </thead>
            <tbody>
                @foreach($actions as $action)
                <tr>
                    <th scope="row">{{ $action->id }}</th>
                    <td>{{ $action->created_at->format('d/m/Y') }}</td>
                    <td>{{ $action->name }} {{ $action->surname }} <div><a href="tel:{{ $action->phone }}">{{ $action->phone }}</a></div></td>
                    <td>{{ $action->action }}</td>
                    <td><a href="{{ route('admin-view-application', ['id' => $action->application->id]) }}">{{ $action->application_id }} {{ $action->application->service->title }}</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop