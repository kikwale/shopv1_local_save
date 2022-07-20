<?php

namespace App\Http\Controllers;

use App\Models\Mauzo;
use App\Models\Product;
use App\Models\YearPeriod;
use App\Models\Money;
use App\Models\LoanFom;
use App\Models\LoanTo;
use App\Models\seller;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
public function index(){
    $data = Seller::where('shop_id',Session::get('shop_id'))->get();
    return view('owner.payments.index')->with('data',$data);
}

public function ownerEmployeeSalary(Request $request){
    
    
    $date = $request['date'];
    $nameOfYear = date('Y', strtotime($date));
    $nameOfMonth = date('M', strtotime($date));
    
    if ($request->method_name1 == '' || $request->number1 == '') {
        $loan = new LoanTo();
        $loan = LoanTo::where('shop_id',Session::get('shop_id'))->where('seller_id',$request->employee_id)->where('balance','!=',0)->first();
        if ($loan) {
            if ($loan->balance < $loan->instalment_payment) {
                $balance  = $loan->balance;
                $lbalance  = $loan->balance - $loan->balance;
                $loan->balance = $lbalance;
                $loan->save();
            } else{
                $balance  = $loan->instalment_payment;
            $lbalance  = $loan->balance - $loan->instalment_payment;
            $loan->balance = $lbalance;
            $loan->save();
            }
            if ($loan->balance <= 0) {
                LoanTo::where('shop_id',Session::get('shop_id'))->where('id',$request->loan_id)->delete();
             }
            DB::table('payments')->insert([
                'employee_id' => $request->employee_id,
                'owner_id' => Session::get('owner_id'),
                'shop_id' => Session::get('shop_id'), 
                'year' => $nameOfYear, 
                'month' => $nameOfMonth,
                'date' => $request['date'], 
                'payment_method' => $request['payment_method'],
                'method_name' => $request->method_name, 
                'number' => $request->number, 
                'salary' => $request->amount,
                'amount_paid' => $request->amount - $balance,
                 ]);
                 return back()->with('success','Successfull...');
        } else {
            DB::table('payments')->insert([
                'employee_id' => $request->employee_id,
                'owner_id' => Session::get('owner_id'),
                'shop_id' => Session::get('shop_id'), 
                'year' => $nameOfYear, 
                'month' => $nameOfMonth,
                'date' => $request['date'], 
                'payment_method' => $request['payment_method'],
                'method_name' => $request->method_name, 
                'number' => $request->number,
                'salary' => $request->amount, 
                'amount_paid' => $request->amount, 
                 ]);
                 return back()->with('success','Successfull...');
        }
        
   
    // LoanFom::where('shop_id',Session::get('shop_id'))->where('id',$request->loan_id)->update(['balance'=>$laon]);
    // //id	loan_foms_id	owner_id	shop_id	seller_id	year	month	date	Payment_method	paid_amount	created_at	updated_at	

   
    } else {
    $loan = new LoanTo();
    $loan = LoanTo::where('shop_id',Session::get('shop_id'))->where('balance','!=',0)->where('seller_id',$request->employee_id)->first();
    
    if ($loan) {
        if ($loan->balance < $loan->instalment_payment) {
            $balance  = $loan->balance;
            $lbalance  = $loan->balance - $loan->balance;
            $loan->balance = $lbalance;
            $loan->save();
        } else{
            $balance  = $loan->instalment_payment;
        $lbalance  = $loan->balance - $loan->instalment_payment;
        $loan->balance = $lbalance;
        $loan->save();
        }

        if ($loan->balance <= 0) {
            LoanTo::where('shop_id',Session::get('shop_id'))->where('id',$request->loan_id)->delete();
         }
        DB::table('payments')->insert([
            'employee_id' => $request->employee_id,
            'owner_id' => Session::get('owner_id'),
            'shop_id' => Session::get('shop_id'), 
            'year' => $nameOfYear, 
            'month' => $nameOfMonth,
            'date' => $request['date'], 
            'payment_method' => $request['payment_method'],
            'method_name' => $request->method_name1, 
            'number' => $request->number1,
            'salary' => $request->amount, 
            'amount_paid' => $request->amount - $balance,
             ]);
  
             return back()->with('success','Successfull...');
    } else {
        DB::table('payments')->insert([
            'employee_id' => $request->employee_id,
            'owner_id' => Session::get('owner_id'),
            'shop_id' => Session::get('shop_id'), 
            'year' => $nameOfYear, 
            'month' => $nameOfMonth,
            'date' => $request['date'], 
            'payment_method' => $request['payment_method'],
            'method_name' => $request->method_name1, 
            'number' => $request->number1, 
            'salary' => $request->amount,
            'amount_paid' => $request->amount,
             ]);
  
             return back()->with('success','Successfull...');
    }
    
   
       // LoanFom::where('shop_id',Session::get('shop_id'))->where('id',$request->loan_id)->update(['balance'=>$laon]);
       // //id	loan_foms_id	owner_id	shop_id	seller_id	year	month	date	Payment_method	paid_amount	created_at	updated_at	
 
    
    }
}
}
