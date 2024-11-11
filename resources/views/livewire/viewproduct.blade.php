<div class="container mt-5">
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-5 mt-3" wire:ignore>
                    <div class="bg-white border">
                        <img src="{{asset($product->productImages[0]->image)}}" class="img-fluid">
                    </div>
                </div>
                <div class="col-md-7 mt-3">
                    <div class="product-view">
                        <h4 class="product-name">
                           {{$product->name}}
                           @if ($product->qty > 0)
                           <label class="badge bg-success float-end">In Stock</label>
                       @else
                           <label class="badge bg-danger float-end">Out of Stock</label>
                       @endif
                                 </h4>
                        <hr>
                        <p class="product-path">
                            Home / {{$category->name}} / {{$product->name}}
                        </p>
                        <div>
                            <span class="selling-price">${{$product->selling_price}}</span>
                            <span class="original-price">${{$product->originial_price}}</span>
                        </div>
                        <div class="mt-2">
                            <div class="input-group">
                                <span class="btn btn1">-</span>
                                <input type="text" readonly class="input-quantity" value={{$qtyCount}} wire:model="qtyCount" style="width: 40px" />
                                <span class="btn btn1" >+</span>
                            </div>
                        </div>
                        <div class="mt-2">
                            <button class="btn btn1"> <i class="bi bi-cart-fill"></i> Add To Cart</button>
                        </div>
                        <div class="mt-3">
                            <h5 class="mb-0">Description</h5>
                            <p>
                                {{$product->descritpion}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
</div>   
