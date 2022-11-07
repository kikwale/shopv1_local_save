<?php

namespace App\Http\Controllers;

use App\Models\YearPeriod;
use App\Models\Mauzo;
use Illuminate\Http\Request;
use App\Models\Expenses;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Models\Product;
use App\Models\Money;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProfitsController extends Controller
{
   public function ownerProfitLoss(){
        return view('owner.profits.index')->with('data','');
   }

   public function ownerNetProfit(){
        $data = YearPeriod::join('month_periods','year_periods.id', '=', 'month_periods.year_periods_id');
                               
    return view('owner.profits.net_profits')->with('data',$data);
}

public function ownerNetProfitForm(Request $request){
     $request->all();
     if($request->condition == 1){
     
          foreach ($request->all() as $key => $value) {
            $expenses = new Expenses();
            if($request->year != "" && $request->month != ""){

               try {
                 $expenses['shop_id'] = $request['shop_id'];
                 $expenses['year'] = $request['year'];
                 $expenses['month'] = $request['month'];
                 $expenses['name'] = $key;
                 $expenses['amount'] = $value;
                 $expenses->save();

                 $profit = Mauzo::where('shop_id',$request['shop_id'])->where('year',$request['year'])->where('month',$request['month'])->sum('profit');
                 return $profit - ($request['rent']+$request['wage']+$request['transport']+$request['salary']+$request['communication']
                        +$request['security']+$request['electricity']+$request['water']+$request['stationery']+$request['other_expenses']);
            }catch(Exception $e){
                 
               if (Str::contains($e->getMessage(), ['Duplicate entry'])) {
                  return back()->with('error', "Duplicate data is not allowed");
               }
            }
           }
            else{
                  return back()->with('period_empty','Empty Year or Month');
            }
          }
        }else{
         $profit = Mauzo::where('shop_id',$request['shop_id'])->where('year',$request['year'])->where('month',$request['month'])->sum('profit');
         return $profit - ($request['rent']+$request['wage']+$request['transport']+$request['salary']+$request['communication']
                +$request['security']+$request['electricity']+$request['water']+$request['stationery']+$request['other_expenses']);
        }
     
     
}


public function ownerAnnualProfit(Request $request){

   $data = DB::table('products')
   ->join('mauzos', 'products.id', '=', 'mauzos.product_id')->where('products.shop_id', $request->shop_id)
   ->where('mauzos.year', $request->year)
   ->cursor();

   $grossProfit = Product::where('shop_id',Session::get('shop_id'))->where('owner_id',Session::get('owner_id'))
   ->where('year','<=', $request->year)->get();


    $gross_profit = 0;
    foreach ($grossProfit as $value) {
        $gross_profit = $gross_profit + ($value->total*$value->purchased_price);
    }

   return view('owner/profits.profits')->with('data',$data)
   ->with('gross_profit',$gross_profit)->with('type',$request->type)->with('val',$request->year);
   
}

public function ownerMonthlyProfit(Request $request){

   $data = DB::table('products')
   ->join('mauzos', 'products.id', '=', 'mauzos.product_id')->where('products.shop_id', $request->shop_id)
   ->where('mauzos.month', $request->month)->where('mauzos.year', $request->year)
   ->cursor();

   $grossProfit = Product::where('shop_id',Session::get('shop_id'))->where('owner_id',Session::get('owner_id'))
  ->where('month','<=', $request->month)->where('year','<=', $request->year)->get();


   $gross_profit = 0;
   foreach ($grossProfit as $value) {
       $gross_profit = $gross_profit + ($value->total*$value->purchased_price);
   }
  
   $month = $request->month;
   $year = $request->year;


   return view('owner/profits.profits')
   ->with('data',$data)
   ->with('gross_profit',$gross_profit)
   ->with('type',$request->type)
   ->with('year',$request->year)
   ->with('month',$request->month);
}

public function ownerDailyProfit(Request $request){

   $data = DB::table('products')
->join('mauzos', 'products.id', '=', 'mauzos.product_id')->where('products.shop_id', $request->shop_id)
->where('mauzos.sales_date', $request->day)
->cursor();

$grossProfit = Product::where('shop_id',Session::get('shop_id'))->where('owner_id',Session::get('owner_id'))
->where('date','<=', $request->day)->get();


$gross_profit = 0;
foreach ($grossProfit as $value) {
$gross_profit = $gross_profit + ($value->total*$value->purchased_price);
}
return view('owner/profits.profits')->with('data',$data)
->with('type',$request->type)->with('date',$request->day)
->with('gross_profit',$gross_profit)->with('success','ghghgj');
   
}

}
