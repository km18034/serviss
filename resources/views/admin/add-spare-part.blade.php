@extends('layouts.admin-master')
@section('content')
    <div class="container"> 
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="col-md-6 mx-auto">    
      <div class="d-flex align-items-center">
            <a href="{{ route('admin-parts-index') }}" class="me-3 action-btn">Back</a>
            <h1>Add Spare Part</h1>
        </div>
        <form action="{{ route('admin-submit-parts') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group my-2">
                    <label>Title</label>
                    <input type="text" class="form-control" placeholder="Enter Spare Part Title" name="title">
                </div>
                <div class="form-group my-2">
                    <label>Image</label>
                    <input type="file" class="form-control" name="image">
                </div>
                <div class="form-group my-2">
                    <label>Description</label>
                    <input type="text" class="form-control" rows="3" name="description">
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
                    <label>Amount</label>
                    <input type="text" class="form-control" placeholder="Enter Spare Part Amount" name="amount">
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="true" id="flexCheckChecked" name="is_aviable">
                    <label class="form-check-label" for="flexCheckChecked">
                    Is Aviable
                    </label>
                </div>

                <button type="submit" class="btn btn-primary my-3">Submit</button>
            </form>
        </div>
    </div>
@stop