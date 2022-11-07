<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\Support\Facades\Session;

class SupplierController extends Controller
{
    public function index(){
        $data = Supplier::all();
        return view('seller.supplier.index')->with('data',$data);
    }

    public function saveSupplier(Request $request){
   
    $supplier = new Supplier;
    $supplier->owner_id = Session::get('owner_id');
    $supplier->shop_id = Session::get('shop_id');
    $supplier->supplier_name = $request->supplier_name;
    $supplier->address = $request->address;
    $supplier->email1 = $request->email1;
    $supplier->email2 = $request->email2;
    $supplier->phone1 = $request->phone1;
    $supplier->phone2 = $request->phone2;
    $supplier->phone3 = $request->phone3;
    $supplier->description = $request->description;
    $supplier->save();

    return back()->with('success','Successfull...');
    }
}
