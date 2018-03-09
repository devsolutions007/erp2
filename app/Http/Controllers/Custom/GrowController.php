<?php

namespace App\Http\Controllers\Custom;


use App\Http\Controllers\Controller;



class GrowController extends Controller
{
    
    public function index() {
        
        return view('custom.grow.index');
    }

    public function basic_grow() {
        
        return view('custom.grow.basic_grow');
    }

    public function room() {
        
        return view('custom.grow.settings.room');
    }

    public function global() {
        
        return view('custom.grow.settings.global');
    }

    public function growIndex() {
        
        return view('custom.grow.growing.index');
    }

    public function historyIndex() {
        
        return view('custom.grow.history.index');
    }

    public function mgtGUI() {
        
        return view('custom.grow.mgt_gui');
    }
   
   
    
}