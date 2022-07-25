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

class LoanController extends Controller
{
   public function ownerLoanFrom(){
    $data = LoanFom::where('shop_id',Session::get('shop_id'))->where('balance','>',0)->get();
    LoanFom::where('shop_id',Session::get('shop_id'))->where('balance','<',0)->update(
      ['balance'=>0]
    );
    return view('owner.loan.loan_from')->with('data',$data);
   }

   public function ownerLoanTo(){
    $data = seller::join('loan_tos','sellers.id','=','loan_tos.seller_id')->where('loan_tos.shop_id',Session::get('shop_id'))
    ->where('loan_tos.balance','>',0)->get();
    LoanTo::where('shop_id',Session::get('shop_id'))->where('balance','<',0)->update(
      ['balance'=>0]
    );
    return view('owner/loan.loan_to')->with('data',$data);
   }

   public function ownerLoanFromModal(Request $request){
      
      $date = $request['loan_date'];
      $nameOfYear = date('Y', strtotime($date));
      $nameOfMonth = date('M', strtotime($date));
      
      //id	name	owner_id	shop_id	loan_amount	year	month	date	payment_period	instalment_payment	balance	created_at	updated_at	
   DB::table('loan_foms')->insert([
      'name' => $request->name,
      'owner_id' => Session::get('owner_id'),
      'shop_id' => Session::get('shop_id'), 
      'loan_amount' => $request['amount'], 
      'year' => $nameOfYear, 
      'month' => $nameOfMonth,
      'date' => $request['loan_date'], 
      'final_date' => $request['final_date'],
      'instalment_payment' => $request->instalment, 
      'balance' => $request->amount, 
       ]);

      return back()->with('success','Successfull...');
   }
   
   public function ownerLoanReturnModal(Request $request){

      $date = $request['loan_date'];
      $nameOfYear = date('Y', strtotime($date));
      $nameOfMonth = date('M', strtotime($date));
      
      $laon = new LoanFom();
      $laon = LoanFom::where('shop_id',Session::get('shop_id'))->where('id',$request->loan_id)->first();
      $lbalance  = $laon->balance - $request->amount;
      $laon->balance = $lbalance;
      $laon->save();
      // LoanFom::where('shop_id',Session::get('shop_id'))->where('id',$request->loan_id)->update(['balance'=>$laon]);
      // //id	loan_foms_id	owner_id	shop_id	seller_id	year	month	date	Payment_method	paid_amount	created_at	updated_at	

      DB::table('loan_from_details')->insert([
         'loan_foms_id' => $request->loan_id,
         'owner_id' => Session::get('owner_id'),
         'shop_id' => Session::get('shop_id'), 
         'year' => $nameOfYear, 
         'month' => $nameOfMonth,
         'date' => $request['date'], 
         'payment_method' => $request['payment_method'],
         'method_name' => $request->method_name, 
         'number' => $request->number, 
         'paid_amount' => $request->amount, 
          ]);
          return back()->with('success','Successfull...');
    
      
   }

   public function ownerLoanToModal(Request $request){
      
      $date = $request['loan_date'];
      $nameOfYear = date('Y', strtotime($date));
      $nameOfMonth = date('M', strtotime($date));
      
      $em = new LoanTo();
      $employee = LoanTo::where('seller_id',$request->name)->first();
      
      if ($employee) {
         $employee->balance = $request->amount + $employee->balance;
         $employee->loan_amount = $request->amount + $employee->balance;
         $employee->save();
        
      
            return back()->with('success','Successfull...');
      } else {
         DB::table('loan_tos')->insert([
            'seller_id' => $request->name,
            'owner_id' => Session::get('owner_id'),
            'shop_id' => Session::get('shop_id'), 
            'loan_amount' => $request['amount'], 
            'year' => $nameOfYear, 
            'month' => $nameOfMonth,
            'date' => $request['loan_date'], 
            'payment_period' => $request['final_date'],
            'instalment_payment' => $request->instalment, 
            'balance' => $request->amount, 
             ]);
      
            return back()->with('success','Successfull...');
      }
      //id	name	owner_id	shop_id	loan_amount	year	month	date	payment_period	instalment_payment	balance	created_at	updated_at	
  
   }


   public function ownerEmployeeLoanReturn(Request $request){
      $date = $request['loan_date'];
      $nameOfYear = date('Y', strtotime($date));
      $nameOfMonth = date('M', strtotime($date));
    
      $laon = new LoanTo();
      $laon = LoanTo::where('shop_id',Session::get('shop_id'))->where('id',$request->loan_id)->first();
      $lbalance  = $laon->balance - $request->amount;
      $laon->balance = $lbalance;
      $laon->save();
      if ($laon->balance <= 0) {
         LoanTo::where('shop_id',Session::get('shop_id'))->where('id',$request->loan_id)->delete();
      }
         // LoanFom::where('shop_id',Session::get('shop_id'))->where('id',$request->loan_id)->update(['balance'=>$laon]);
         // //id	loan_foms_id	owner_id	shop_id	seller_id	year	month	date	Payment_method	paid_amount	created_at	updated_at	
   
         DB::table('loan_to_details')->insert([
            'loan_tos_id' => $request->loan_id,
            'owner_id' => Session::get('owner_id'),
            'shop_id' => Session::get('shop_id'), 
            'year' => $nameOfYear, 
            'month' => $nameOfMonth,
            'date' => $request['date'], 
            'payment_method' => $request['payment_method'],
            'method_name' => $request->method_name, 
            'number' => $request->number, 
            'paid_amount' => $request->amount, 
             ]);

             return back()->with('success','Successfull...');
   
      
      
   }
}
