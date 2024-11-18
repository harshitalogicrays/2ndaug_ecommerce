@extends('layouts.app')
@section('content')
<div class="container mt-3">
    <h1>products</h1><hr/>

    <div class="row">
        <div class="col">
            <div class="row">
                @foreach ($products as $pro)
                <div class="col-md-4">
                 <div class="product-card">
                     <div class="product-card-img">
                         @if ($pro->qty > 0)
                             <label class="stock bg-success">In Stock</label>
                         @else
                             <label class="stock bg-danger">Out of Stock</label>
                         @endif
                         @if ($pro->productImages()->count() > 0)
                         <a href="{{url('/collection/'.$pro->category->id.'/'.$pro->name)}}">
                            <img src="{{asset($pro->productImages[0]->image)}}" alt="Laptop" height='180x'>
                         </a>
                                  @endif
                        
                     </div>
                     <div class="product-card-body">
                         <p class="product-brand">{{$pro->brand}}</p>
                         <h5 class="product-name">
                             {{$pro->name}}

                         </h5>
                         <div>
                             <span class="selling-price">${{$pro->selling_price}}</span>
                             <span class="original-price">${{$pro->originial_price}}</span>
                         </div>
                     </div>
                 </div>
             </div>
             @endforeach
            
             </div> </div>

        </div>
    </div>

   {{$products->links('pagination::bootstrap-5')}}
 </div>
@endsection