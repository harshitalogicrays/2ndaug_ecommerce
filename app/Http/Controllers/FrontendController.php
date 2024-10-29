<?php

namespace App\Http\Controllers;

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
            $cname = $category->name;
            $products = $category->products()->get();
            return view('cproducts',compact('products','cname'));
        }
    }
}
