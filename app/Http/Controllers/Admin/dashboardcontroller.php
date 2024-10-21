<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class dashboardcontroller extends Controller
{
    function index(){
        return view('Admin.dashboard');
    }
}
