<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreditcollectionController extends Controller
{
   public function collectFromInvoice(){
    $data = [];
    return view('seller.credit_collection.invoice.index')->with('data',$data);
   }

   public function collectFromCreditSale(){
    $data = [];
    return view('seller.credit_purchase.index')->with('data',$data);
   }
}
