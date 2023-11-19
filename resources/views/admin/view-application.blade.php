@extends('layouts.admin-master')
@section('content')
    <div class="container">
        <div class="d-flex align-items-center">
            <a href="{{ route('admin-dashboard') }}" class="me-3 action-btn">Back</a>
            <h1>Application Info</h1>
        </div>
        <div class="col-md-6 profile">
            <div class="row">
                <div class="col-6"><div class="label">Id</div></div>
                <div class="col-6">{{ $application->id }}</div>
            </div>
            <div class="row">
                <div class="col-6"><div class="label">Customer</div></div>
                <div class="col-6">{{ $application->customer->name }} {{ $application->customer->surname }} <div>{{ $application->customer->phone }}</div></div>
            </div>
            <div class="row">
                <div class="col-6"><div class="label">Service</div></div>
                <div class="col-6">{{ $application->service->title }}</div>
            </div>
            <div class="row">
                <div class="col-6"><div class="label">Mechanic</div></div>
                <div class="col-6">{{ $application->mechanic->name }} {{ $application->mechanic->surname }} <div>{{ $application->mechanic->phone }}</div></div>
            </div>
            <div class="row">
                <div class="col-6"><div class="label">Auto Brand</div></div>
                <div class="col-6">{{ $application->auto_brand }}</div>
            </div>
            <div class="row">
                <div class="col-6"><div class="label">Description</div></div>
                <div class="col-6">{{ $application->description }}</div>
            </div>
            <div class="row">
                <div class="col-6"><div class="label">Date</div></div>
                <div class="col-6">{{ $application->date }}</div>
            </div>
            <div class="row">
                <div class="col-6"><div class="label">Status</div></div>
                <div class="col-6">{{ $application->status }}</div>
            </div>
            <div class="row">
                <div class="col-6"><div class="label">Spare Parts</div></div>
                <div class="col-6">  
                    <ul>
                        @foreach($application->spareParts as $part)
                            <li>{{ $part->sparePart->title }} <b>{{ $part->amount }}</b></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@stop