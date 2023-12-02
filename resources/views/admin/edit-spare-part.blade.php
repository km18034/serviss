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
            <h1>Edit Spare Part</h1>
        </div>
        <form action="{{ route('admin-submit-edit-part', ['id' => $part->id]) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group my-2">
                    <label>Title</label>
                    <input type="text" class="form-control" placeholder="Enter Spare Part Title" name="title" value="{{ $part->title }}" @disabled($admin_user->role === 'mechanic')>
                </div>
                <div class="form-group my-2">
                    <label>Image</label><br>
                    <img height="100" src="{{ asset('/storage/images/' . $part->image_name) }}" alt="img">
                    @if($admin_user->role !== 'mechanic')
                        <input type="file" class="form-control" name="image">
                    @endif
                </div>
                <div class="form-group my-2">
                    <label>Description</label>
                    <input type="text" class="form-control" rows="3" name="description" value="{{ $part->description }}" @disabled($admin_user->role === 'mechanic')>
                </div>
                <div class="form-group my-2">
                    <label>Auto</label>
                    <select class="form-select" name="auto_model_id">
                        <option selected value="">Select Auto</option>
                        @foreach($cars as $car)
                            <option value="{{ $car->id }}" @selected($car->id === $part->auto_model_id)>{{ $car->brand->title }} {{ $car->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group my-2">
                    <label>Amount</label>
                    <input type="text" class="form-control" placeholder="Enter Spare Part Amount" name="amount" value="{{ $part->amount }}">
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="true" id="flexCheckChecked" name="is_aviable" @checked($part->is_aviable) @disabled($admin_user->role === 'mechanic')>
                    <label class="form-check-label" for="flexCheckChecked">
                    Is Aviable
                    </label>
                </div>

                <button type="submit" class="btn btn-primary my-3">Submit</button>
            </form>
        </div>
    </div>
@stop