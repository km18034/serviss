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
            <a href="{{ route('admin-services-index') }}" class="me-3 action-btn">Back</a>
            <h1>Add Service</h1>
        </div>
        <form action="{{ route('admin-submit-service') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group my-2">
                    <label>Title</label>
                    <input type="text" class="form-control" placeholder="Enter Service Title" name="title">
                </div>
                <div class="form-group my-2">
                    <label>Image</label>
                    <input type="file" class="form-control" name="image">
                </div>
                <div class="form-group my-2">
                    <label>Description</label>
                    <textarea class="form-control" rows="3" name="description"></textarea>
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