<?php

namespace App\Http\Controllers\CashDesk;


use Illuminate\Http\Request;
use App\Product;
use App\Http\Controllers\Controller;



class POSController extends Controller
{
    
    public function affIndex() {

        $products = Product::paginate(15);
        return view('cashdesk.affIndex', compact('products'));
    }
   
    
}