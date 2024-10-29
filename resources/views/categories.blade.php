@extends('layouts.app')
@section('content')
<div class="container mt-5">
   <h1>Categories</h1><hr/>
    <div class="row">
        @forelse ($categories as $c)
        <div class="col-3 mb-3">
            <div class="card">
                <a href="{{url('/collection/'.$c->id)}}" class="text-decoration-none text-black">
                <img class="card-img-top" src="{{asset($c->image)}}" height="200px" alt={{$c->name}} />
                <div class="card-body">
                    <h4 class="card-title">{{$c->name}}</h4>
                </div>
            </a>
            </div>
            
        </div>
        @empty
                <h1>No category found</h1>
        @endforelse
        
    </div>
</div>
@endsection