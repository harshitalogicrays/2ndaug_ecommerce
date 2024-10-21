@extends('layouts.admin')
@section('content')
@if (session('message'))
<div class="alert alert-success alert-dismissible" role="alert">
    {{ session('message') }}
    <button class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif
    <h1>Admin Dashboard</h1>
@endsection