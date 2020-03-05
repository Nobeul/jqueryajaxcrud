<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //login page
    public function login(){
        return view('admin.login');
    }
    public function products(){
        return view('products.productlist');
    }
}
