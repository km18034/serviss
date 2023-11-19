@extends('layouts.master')
@section('content')
    <div class="container">  
        <h1>Mechanics</h1>
        <div class="col-md-6 profile">
            @foreach($mechanics as $mechanic)
                <div class="row">
                    <div class="col-md-4">{{ $mechanic->name }} {{ $mechanic->surname }}</div>
                    <div class="col-md-5"><a href="mailto:{{ $mechanic->email }}">{{ $mechanic->email }}</a></div>
                    <div class="col-md-3"><a href="tel:{{ $mechanic->phone }}">{{ $mechanic->phone }}</a></div>
                </div>
            @endforeach
        </div>
    </div>
@stop