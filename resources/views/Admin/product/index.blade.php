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
        <h1>View Products
            <a type="button"  class="btn btn-primary btn-lg float-right" href={{url('/admin/product/add')}}> Add </a>    
        </h1>
    </div>
    <div class="card-body">
        <div class="table-responsive mb-3">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th>Category</th>
                        <th scope="col">Name</th>
                        <th scope="col">Image</th>
                        <th>Price</th>
                        <th scope="col">status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                  @forelse ($products as $product)
                      <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->category->name}}</td>
                        <td>{{$product->name}}</td>
                        <td>
                          @if ($product->productImages()->count()>0)
                            <img src="{{asset($product->productImages[0]->image)}}" width='50px' height='50px'>
                          @endif
                        </td>
                        <td>{{$product->originial_price}}</td>
                        <td>
                            @if ($product->status == '0')
                                <span  class="badge rounded-pil badge-success">Active</span>
                            @else
                            <span  class="badge rounded-pil badge-danger">Inactive</span>
                            @endif
                         </td>
                        <td>
                          <a name="" id="" class="btn btn-success btn-sm" h href="{{'/admin/product/edit/'.$product->id}}" role="button"><i class="fas fa-pen"></i></a>
                          <a name="" id="" class="btn btn-danger btn-sm" href="{{'/admin/product/delete/'.$product->id}}" role="button" onclick="return window.confirm('are you sure to delete this??')"><i class="fas fa-trash"></i></a>
                        </td>
    
                      </tr>
                  @empty
                    <tr><td colspan="6">No product found</td> </tr>
                  @endforelse
                </tbody>
            </table>
          </div>
          {{$products->links('pagination::bootstrap-5')}}
    </div>
</div>
@endsection