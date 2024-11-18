<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Categories;
use Illuminate\Http\Request;

class FrontendController extends Controller
{   
    function index(){
        return view('index');
    }
    function collection(){
        $categories = Categories::where('status','=','0')->get();
        return view('categories',compact('categories'));
    }

    function cproducts($id){
        $category = Categories::find($id);
        if($category){
            $products = $category->products()->where('status','=','0')->get();
            return view('cproducts',compact('products','category'));
        }
    }
    function viewproduct($category,$product){
        $category = Categories::find($category);
        if($category){
            $product = $category->products()->where('name','=',$product)->where('status','=','0')->first();
            if($product){
                return view('viewproduct',compact('category','product'));
            }
            else{
                return redirect()->back();
            }
        }
      
    }
    function searchproduct(Request $request){
        if($request->search !=null){
            $products=Products::where('name','LIKE','%'.$request->search."%")->orWhere('brand','LIKE','%'.$request->search."%")->latest()->paginate(5);
            return view('searchproduct',compact('products'));
         }
         else{
             $products=Products::paginate(5);
             return view('searchproduct',compact('products'));
         }
    }
}
