<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function showAboutUs(){
    	
    	return view('AboutUs');
    }
    public function showProduct(){
    	
    	return view('product');
    }
}