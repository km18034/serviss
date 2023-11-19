@extends('layouts.admin-master')
@section('content')
    <div class="container">  
        <div class="d-flex align-items-center">
            <h1>Cars</h1>
            <a href="{{ route('admin-add-brand-form-index') }}" class="ms-3 action-btn">Add New Atuo Brand</a>
            <a href="{{ route('admin-add-model-form-index') }}" class="ms-3 action-btn">Add New Atuo Model</a>
        </div>
    </div>
@stop