@extends('layouts.admin-master')
@section('content')
    <div class="container">
        <div class="d-flex align-items-center">
            <a href="{{ route('admin-cars-index') }}" class="me-3 action-btn">Back</a>
            <h1>Add Auto Brand</h1>
        </div>
        <div class="col-md-6">
            <form action="#" method="POST">
                {{ csrf_field() }}
                <div class="form-group my-2">
                    <label>Title</label>
                    <input type="text" class="form-control" placeholder="Enter Service Title" name="title">
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="true" id="flexCheckChecked" name="is_public">
                    <label class="form-check-label" for="flexCheckChecked">
                    Is Public
                    </label>
                </div>

                <button type="submit" class="btn btn-primary my-3">Submit</button>
            </form>
        </div>
    </div>
@stop