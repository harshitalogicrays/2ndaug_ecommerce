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
        <h1>Add Product
            <a type="button"  class="btn btn-primary btn-lg float-right" href={{url('/admin/product/view')}}> View </a>    
        </h1>
    </div>
    <div class="card-body">
        <form method="post" enctype="multipart/form-data" action="{{url('/admin/product/add')}}">
            @csrf
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="details-tab" data-toggle="tab" data-target="#details" type="button" role="tab" aria-controls="details" aria-selected="false">details</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="image-tab" data-toggle="tab" data-target="#image" type="button" role="tab" aria-controls="image" aria-selected="false">image</button>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">

            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="card mt-3 p-3">
                    <div class="mb-3">
                        <label for="" class="form-label">Category</label>
                        <select class="form-control" name="category_id">
                            <option selected disabled>Select one</option>
                            @foreach ($categories as $c)
                            <option value={{$c->id}}>{{$c->name}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                        
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Name</label>
                        <input type="text"  name="name" class="form-control" />
                        @error('name')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Brand</label>
                        <input type="text"  name="brand" class="form-control" />
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox"  name="status" />
                        <label class="form-check-label" for="">status </label>
                    </div>
                </div>

            </div>
            <div class="tab-pane fade" id="details" role="tabpanel" aria-labelledby="details-tab">
                <div class="card mt-3 p-3">
                    <div class="mb-3">
                        <label for="" class="form-label">originial_price</label>
                        <input type="number"  name="originial_price" class="form-control" />
                        @error('originial_price')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">selling_price</label>
                        <input type="number"  name="selling_price" class="form-control" />
                        @error('selling_price')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">qty</label>
                        <input type="number"  name="qty" class="form-control" />
                        @error('qty')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Descritpion</label>
                        <textarea type="text"  name="descritpion" class="form-control"></textarea>
                        <small class="text-danger"></small>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="image" role="tabpanel" aria-labelledby="image-tab">
                <div class="card mt-3 p-3">
                    <div class="mb-3">
                        <label for="" class="form-label">Choose file</label>
                        <input type="file" class="form-control-file" name="images[]" multiple/>
                    </div>
                    <button type="submit" class="btn btn-primary"  >
                        Submit
                    </button>
                    
                </div>
            </div>
        
          </div>
        </form>
        </div>
</div>
@endsection