@extends('layouts.master')
@section('content')
    <div class="container">  
        <div class="d-flex align-items-center">
            <a href="/applications" class="me-3 action-btn">Back</a>
            <h1>Create application</h1>
        </div>
        <form action="/submit-application" method="POST">
            {{ csrf_field() }}
            <div class="form-group my-2">
                <label>Auto Brand</label>
                <input type="text" class="form-control" placeholder="Enter Auto Brand" name="auto_brand">
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
@stop