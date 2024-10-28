@extends('layouts.admin')
@section('content')
@if (session('message'))
<div class="alert alert-success alert-dismissible" role="alert">
    {{ session('message') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
</div>
@endif
<div class="card mt-5">
    <div class="card-header">
        <h1>Edit Product
            <a type="button"  class="btn btn-primary btn-lg float-right" href={{url('/admin/product/view')}}> View </a>    
        </h1>
    </div>
    <div class="card-body">
    
    </div>
</div>
@endsection