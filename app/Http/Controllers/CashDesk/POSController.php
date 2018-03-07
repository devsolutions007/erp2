<?php

namespace App\Http\Controllers\CashDesk;


use App\Http\Controllers\Controller;



class POSController extends Controller
{
    
    public function affIndex() {
        
        return view('cashdesk.affIndex');
    }
   
    
}