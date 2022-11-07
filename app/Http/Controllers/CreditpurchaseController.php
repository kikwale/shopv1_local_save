<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreditpurchaseController extends Controller
{
    public function index(){
        $data = [];
        return view('seller.credit_purchase.index')->with('data',$data);
    }
}
