@extends('layouts.admin-login')
@section('content')
    <div class="container"> 
       <div class="col-md-6 mx-auto"> 
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h1>Admin Login</h1>
            <form action="{{route('admin-submit-login')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group my-2">
                        <label>Email</label>
                        <input type="email" class="form-control" placeholder="Enter email" name="email">
                    </div>
                    <div class="form-group my-2">
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="Password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary my-3">Login</button>
            </form>
        </div>
    </div>
@stop