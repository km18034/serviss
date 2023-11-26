@extends('layouts.master')
@section('content')
    <div class="container">  
        <div class="col-md-6 mx-auto">
            <div class="d-flex align-items-center">
                <a href="{{ route('applications-index') }}" class="me-3 action-btn">Back</a>
                <h1>Create application</h1>
            </div>
            <form action="{{ route('submit-application') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group my-2">
                    <label>Service</label>
                    <select class="form-select" name="service_id">
                        <option selected value="">Select Service</option>
                        @foreach($services as $service)
                            <option value="{{ $service->id }}">{{ $service->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group my-2">
                    <label>Mechanic</label>
                    <select class="form-select" name="mechanic_id">
                        <option selected value="">Select Mechanic</option>
                        @foreach($mechanics as $mechanic)
                            <option value="{{ $mechanic->id }}">{{ $mechanic->name }} {{ $mechanic->surname }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group my-2">
                    <label>Auto</label>
                    <select class="form-select" name="auto_model_id">
                        <option selected value="">Select Auto</option>
                        @foreach($cars as $car)
                            <option value="{{ $car->id }}">{{ $car->brand->title }} {{ $car->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group my-2">
                    <label>Date</label>
                    <input type="date" class="form-control" name="date">
                </div>
                <div class="form-group my-2">
                    <label>Description</label>
                    <textarea class="form-control" rows="3" name="description"></textarea>
                </div>

                <button type="submit" class="btn btn-primary my-3">Submit</button>
            </form>
        </div>
    </div>
@stop