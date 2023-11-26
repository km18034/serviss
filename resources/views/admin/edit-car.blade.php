@extends('layouts.admin-master')
@section('content')
    <div class="container">
        <div class="d-flex align-items-center">
            <a href="{{ route('admin-cars-index') }}" class="me-3 action-btn">Back</a>
            <h1>Edit Car</h1>
        </div>
        <div class="col-md-6">
            <form action="{{ route('admin-submit-edit-car', ['id' => $auto_model->id]) }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group my-2">
                    <label>Auto Brand</label>
                    <select class="form-select" name="auto_brand_id">
                        <option selected value="">Select Auto Brand</option>
                        @foreach($auto_brands as $brand)
                            <option value="{{ $brand->id }}" @selected($brand->id === $auto_model->brand->id)>{{ $brand->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group my-2">
                    <label>Title</label>
                    <input type="text" class="form-control" placeholder="Enter Auto Model" name="title" value="{{ $auto_model->title }}">
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="true" id="flexCheckChecked" name="is_public"  @checked($auto_model->is_public)>
                    <label class="form-check-label" for="flexCheckChecked">
                    Is Public
                    </label>
                </div>

                <button type="submit" class="btn btn-primary my-3">Submit</button>
            </form>
        </div>
    </div>
@stop