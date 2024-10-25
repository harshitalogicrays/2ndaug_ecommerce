<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    function index(){
        $categories = Categories::paginate(3);
        return view('Admin.category.index',compact('categories'));
    }
    function create(){
        return view('Admin.category.add');
    }
    function store(CategoryRequest $request){
        $validatedData = $request->validated();
        $category = new Categories();
        $category->name = $validatedData['name'];
        $category->description = $request->description;
        $category->status = $request->status==true ? '0':'1';
        $file = $request->file('image');
        if($request->hasFile('image')){
            $filename =time()."ecommerce.".$file->getClientOriginalExtension(); 
            $file->move('uploads/category',$filename); //public /uploads 
            $category->image = 'uploads/category/'.$filename;  }
        if($category->save()){
            return redirect('/admin/category/view')->with('message','category added');
        }
    }
    function delete($id){
        $category = Categories::find($id);
        if($category){
            if(File::exists($category->image)){
                File::delete($category->image);
            }
            $category->delete();
            return redirect('/admin/category/view')->with('message','category deleted');
        }
    }
    function edit($id){
        $category = Categories::find($id);
        return view('Admin.category.edit',compact('category'));}

    function update($id,CategoryRequest $request){
        $validatedData = $request->validated();
        $category = Categories::find($id);
        $category->name = $validatedData['name'];
        $category->description = $request->description;
        $category->status = $request->status==true ? '0':'1';
        $file = $request->file('image');
        if($request->hasFile('image')){
            if(File::exists($category->image)){
                File::delete($category->image);
            }
            $filename =time()."ecommerce.".$file->getClientOriginalExtension(); 
            $file->move('uploads/category',$filename); //public /uploads 
            $category->image = 'uploads/category/'.$filename;  }
        if($category->save()){
            return redirect('/admin/category/view')->with('message','category added');
        }
    }
}
