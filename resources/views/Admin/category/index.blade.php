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
        <h1>View Categories
            <a type="button"  class="btn btn-danger btn-lg float-right" href={{url('/admin/category/add')}}> Add </a>    
        </h1>
    </div>
    <div class="card-body">
        <table class="table  table-striped">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Image</th>
                <th scope="col">Desc</th>
                <th>status</th><th>Action</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($categories as $c )
              <tr>
                <th scope="row">{{$c->id}}</th>
                <td>{{$c->name}}</td>
                <td><img src="{{asset($c->image)}}" width='50px' height='50px'/></td>
                <td>{{$c->description}}</td>
                <td> @if ($c->status=='0')
                  <span class="badge rounded-pil badge-success" >Active</span >
                @else
                <span class="badge rounded-pill badge-danger" >Inactive</span >
                @endif
              </td>
                <td>
                  <a class="btn btn-success me-2" href="{{url('/admin/category/edit/'.$c->id)}}"><i class="fas fa-pen"></i></a>
                  <a class="btn btn-danger" onclick="return window.confirm('are you sure to delete this??')" href="{{url('/admin/category/delete/'.$c->id)}}"><i class="fas fa-trash"></i></a>
                </td>
              </tr>
              @empty
                <tr><td colspan="6">No Category found</td></tr>
              @endforelse
            
            </tbody>
          </table>
    </div>
    {{$categories->links('pagination::bootstrap-5')}}
</div>
@endsection