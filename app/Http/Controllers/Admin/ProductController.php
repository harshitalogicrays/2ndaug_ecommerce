<?php

namespace App\Http\Controllers\Admin;

use App\Models\Products;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\ProductDetails;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ProductFormRequest;

class ProductController extends Controller
{
    function index(){
        $products = Products::paginate(3);
        return view('Admin.product.index',compact('products'));
    }
    function create(){
        $categories  =  Categories::all();
        return view('Admin.product.add',compact('categories'));
    }
    function store(ProductFormRequest  $request){ // dd($request->all());
        $validatedData = $request->validated();
        $category = Categories::find($validatedData['category_id']);
       $product =  $category->products()->create([
        'category_id'=>$validatedData['category_id'],
        'name'=>$validatedData['name'],
        'selling_price'=>$validatedData['selling_price'],
        'originial_price'=>$validatedData['originial_price'],
        'qty'=>$validatedData['qty'],
        'brand'=>$request['brand'],
        'descritpion'=>$request['descritpion'],
        'status'=>$request['status']==true ? '0':'1'  ]);

        if($request->hasFile('images')){          
            $uploadPath='uploads/products/';
            $i=1;
            foreach($request->file('images') as $imageFile){
                $filename =time()."ecommerce".$i++.".".$imageFile->getClientOriginalExtension(); 
                $imageFile->move($uploadPath,$filename); 
                $finalPath = $uploadPath.$filename;
                $product->productImages()->create([
                    'product_id'=>$product['id'],
                    'image'=>$finalPath
                ]);
            }  }
        return redirect('/admin/product/view')->with('message','product added');
    }
    function edit($id){
        $product = Products::find($id);
        $categories  =  Categories::all();
        return view('Admin.product.edit',compact('product','categories'));
    }
    function update($id,ProductFormRequest  $request){
        $validatedData = $request->validated();
        $product = Products::find($id);
        if($product){
            $product->update([
            'category_id'=>$validatedData['category_id'],
            'name'=>$validatedData['name'],
            'selling_price'=>$validatedData['selling_price'],
            'originial_price'=>$validatedData['originial_price'],
            'qty'=>$validatedData['qty'],
            'brand'=>$request['brand'],
            'descritpion'=>$request['descritpion'],
            'status'=>$request['status']==true ? '0':'1' 
            ]);
        }
        if($request->hasFile('images')){          
            $uploadPath='uploads/products/';
            $i=1;
            foreach($request->file('images') as $imageFile){
                $filename =time()."ecommerce".$i++.".".$imageFile->getClientOriginalExtension(); 
                $imageFile->move($uploadPath,$filename); 
                $finalPath = $uploadPath.$filename;
                $product->productImages()->create([
                    'product_id'=>$product['id'],
                    'image'=>$finalPath
                ]);
            }  }
        return redirect('/admin/product/view')->with('message','product updated');
    }


    function delete($id){
        $product = Products::find($id);
        if($product->productImages){
            foreach($product->productImages as $images){
                if(File::exists($images->image)){
                    File::delete($images->image);
                }
            }
           
            $product->delete();
            return redirect('/admin/product/view')->with('message','product deleted');
        }
    }

    function destroy($id){
       $productimage = ProductDetails::find($id);
       if(File::exists($productimage->image)){
        File::delete($productimage->image);
        }
        $productimage->delete();
        return redirect()->back();
    }
}
