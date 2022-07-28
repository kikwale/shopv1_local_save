<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index(){
        $data = [];
        return view('seller/invoice.index')->with('data',$data);
    }

    public function newInvoice(){
        return view('seller.invoice.invoice');
    }
}
