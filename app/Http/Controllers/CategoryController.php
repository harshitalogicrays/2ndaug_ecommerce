<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function index(){
        return view('Admin.category.index');
    }
    function create(){
        return view('Admin.category.add');
    }
}
