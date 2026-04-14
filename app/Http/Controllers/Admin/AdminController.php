<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin.dashboard.index');
    }
    public function users(){
        return view('admin.users.index');
    }
    public function products(){
        return view('admin.products.index');
    }
    public function categories(){
        return view('admin.categories.index');
    }
    public function brands(){
        return view('admin.brands.index');
    }

    

}
