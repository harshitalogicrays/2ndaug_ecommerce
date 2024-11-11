<div class="container mt-3">
    <h1>products</h1><hr/>

    <div class="row">
        <div class="col-3">
            <div class="card">
                <div class="card-header">price</div>
                <div class="card-body">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="below1000" name="priceSort"
                        wire:model="priceInput"/>
                        <label class="form-check-label" for=""> &lt;=1000 </label>
                    </div>                    
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="below2000" name="priceSort"
                        wire:model="priceInput"/>
                        <label class="form-check-label" for=""> &gt;1000 and &lt;= 2000  </label>
                    </div>  
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="below3000" name="priceSort"
                        wire:model="priceInput"/>
                        <label class="form-check-label" for=""> &gt;2000 and &lt;= 3000  </label>
                    </div>  
                </div>
            </div>
        </div>
        <div class="col">
            <div class="row">
                @forelse ($products as $pro)
                <div class="col-md-4">
                 <div class="product-card">
                     <div class="product-card-img">
                         @if ($pro->qty > 0)
                             <label class="stock bg-success">In Stock</label>
                         @else
                             <label class="stock bg-danger">Out of Stock</label>
                         @endif
                         @if ($pro->productImages()->count() > 0)
                         <a href="{{url('/collection/'.$category->id.'/'.$pro->name)}}">
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
                @empty
                    <h1>No Product Found for {{$category->name}}</h1>
                @endforelse 
            
             </div> </div>

            {{-- <div class="row">
                @forelse ($products as $prod)
                <div class="col-4 mb-3">
                    <div class="card">
                        <img class="card-img-top" src="{{asset($prod->productImages[0]->image)}}" height="200px" alt={{$prod->name}} />
                        <div class="card-body">
                            <h5 class="card-title">{{$prod->name}}
                                @if ($prod->qty>0)
                                   <span class="float-end badge rounded-pill text-bg-success">In Stock</span>
                                @else
                                <span class="float-end badge rounded-pill text-bg-danger">Out of Stock</span>
                                @endif
                          
                            </h5>
                            <span>{{$prod->brand}}</span><br/>
                            <span>${{$prod->selling_price}}</span>
                        </div>
                    </a>
                    </div>
                </div>
                @empty
                        <h1>No product found for {{$cname}} category</h1>
                @endforelse
                
            </div> --}}
        </div>
    </div>

   
 </div>