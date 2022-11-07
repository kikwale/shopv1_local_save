<?php

namespace App\Http\Controllers;

use App\Models\Mauzo;
use App\Models\Product;
use App\Models\YearPeriod;
use App\Models\Money;
use App\Models\LoanFom;
use App\Models\LoanTo;
use App\Models\Payment;
use App\Models\seller;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

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
    
try {
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
            'method_name' => $request->method_name, 
            'number' => $request->number, 
            'salary' => $request->amount,
            'amount_paid' => $request->amount,
             ]);
  
             return back()->with('success','Successfull...');
    }
    
} catch (\Throwable $e) {
    if (Str::contains($e->getMessage(),['Duplicate entry '])) {
        return back()->with('duplicate','Duplicate of Payments in one Month and year for one Employee');
    } else{
        return back()->with('error','Error');
    }
}
   
}

public function ownerPaymentInfo(Request $request){
     
    $payments = Payment::where('employee_id',$request->pay)->get();
     Log::info($payments);
    return view('owner/payments.payment_details') ->with('payments',$payments);
  }
  public function ownerPaymentDelete(Request $request){
     Payment::where('employee_id',$request->pay)->delete();
     return back()->with('success','Deleted Successfull...');
  }

}
