@extends('layouts.app')
@section('content')
<div class="container mt-5">
   <h1>products</h1><hr/>
    <div class="row">
        @forelse ($products as $prod)
        <div class="col-3 mb-3">
            <div class="card">
                <img class="card-img-top" src="{{asset($prod->productImages[0]->image)}}" height="200px" alt={{$prod->name}} />
                <div class="card-body">
                    <h4 class="card-title">{{$prod->name}}</h4>
                </div>
            </a>
            </div>
            
        </div>
        @empty
                <h1>No product found for {{$cname}} category</h1>
        @endforelse
        
    </div>
</div>
@endsection