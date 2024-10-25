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
        <h1>Update Category
            <a type="button"  class="btn btn-primary btn-lg float-right" href={{url('/admin/category/view')}}> View </a>    
        </h1>
    </div>
    <div class="card-body">
        <form method="post" action={{url('/admin/category/update/'.$category->id)}} enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input type="text" name="name" class="form-control"  value="{{$category->name}}"/>
                @error('name')
                <small  class="text-danger">{{$message}}</small>
                @enderror
            
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Image</label>
                <input type="file" name="image" class="form-control-file" />
            </div> 
                @if ($category->image)
                <img src="{{asset($category->image)}}" width='50px' height='50px'/> 
                @endif

            <div class="mb-3">
                <label for="" class="form-label">description</label>
                <textarea name="description" class="form-control" value="{{$category->description}}">{{$category->description}}</textarea>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="status" 
                {{$category->status=="0" ? "checked":''}}/>
                <label class="form-check-label" for="">status ( {{$category->status=="0" ? "Active":'Inactive'}})</label>
            </div>
                <button  type="submit" class="btn btn-primary btn-block"   >
                Update
            </button>
            
           
            
        </form>
    </div>
</div>
@endsection