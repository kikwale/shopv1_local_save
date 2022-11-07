<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    public function index(){
        $data = Customer::all();
        return view('seller.customer.index')->with('data',$data);
    }

    public function saveCustomer(Request $request){
   
    $customer = new Customer;
    $customer->owner_id = Session::get('owner_id');
    $customer->shop_id = Session::get('shop_id');
    $customer->customer_name = $request->customer_name;
    $customer->address = $request->address;
    $customer->email1 = $request->email1;
    $customer->email2 = $request->email2;
    $customer->phone1 = $request->phone1;
    $customer->phone2 = $request->phone2;
    $customer->phone3 = $request->phone3;
    $customer->description = $request->description;
    $customer->save();

    return back()->with('success','Successfull...');
    }
}
