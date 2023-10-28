@extends('layouts.master')
@section('content')
    <div class="container">  
        <h1>Services</h1>
        <div class="row">
        @foreach($services as $service)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img height="200" class="card-img-top" src="{{ asset('/storage/images/' . $service->image_name) }}" alt="{{ $service->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $service->title }}</h5>
                        <p class="card-text">{{ $service->description }}</p>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
@stop