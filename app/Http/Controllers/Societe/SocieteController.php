<?php

namespace App\Http\Controllers\Societe;


use App\Http\Controllers\Controller;

use Illuminate\Http\Request;


class SocieteController extends Controller
{
    
    public function modal_card() {
        
        return view('societe.modal_card');
    }

    public function pos_consumption() {
        return view('societe.pos_consumption');
    }
    
   
    
}