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
                <th scope="col">Sr. No</th>
                <th scope="col">Name</th>
                <th scope="col">Image</th>
                <th scope="col">Desc</th>
                <th>status</th><th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>Thornton</td>
                <td>@fat</td>
              </tr>
            </tbody>
          </table>
    </div>
</div>
@endsection