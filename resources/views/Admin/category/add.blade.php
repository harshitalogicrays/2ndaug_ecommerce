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
        <h1>Add Category
            <a type="button"  class="btn btn-primary btn-lg float-right" href={{url('/admin/category/view')}}> View </a>    
        </h1>
    </div>
    <div class="card-body">
        <form method="post" action={{url('/admin/category/add')}} enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" />
                <small  class="text-danger"></small>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Image</label>
                <input type="file" name="image" class="form-control-file" />
                <small  class="text-danger"></small>
            </div> 
            <div class="mb-3">
                <label for="" class="form-label">description</label>
                <textarea name="description" class="form-control"></textarea>
                <small  class="text-danger"></small>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="" />
                <label class="form-check-label" for="">status </label>
            </div>
                <button  type="submit" class="btn btn-primary btn-block"   >
                Submit
            </button>
            
           
            
        </form>
    </div>
</div>
@endsection