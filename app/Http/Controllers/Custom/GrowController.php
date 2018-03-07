<?php

namespace App\Http\Controllers\Custom;


use App\Http\Controllers\Controller;



class GrowController extends Controller
{
    
    public function index() {
        
        return view('custom.grow.index');
    }
   
    
}