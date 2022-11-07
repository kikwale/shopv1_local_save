<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

use App\Models\Maduka;
use App\Models\Mauzo;
use App\Models\User;
use App\Models\YearPeriod;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use App\Models\seller;

class AuthenticationController extends Controller
{
    public function auth(Request $request){
       
        try {
            
            $response = Http::post('https://shotram.com/api/auth', 
            $request->all()
           );
         
           if ($response['role']) {
            
            /*
    Full texts	
    id
    product_id
    seller_id
    owner_id
    shop_id
    day
    month
    year
    quantity
    amount
    discount
    profit
    created_at*/
    
    
            $date = date('Y-m-d');
            $date1=date('Y-m-d');
            $nameOfDay = date('l', strtotime($date));
            $nameOfMonth = date('M', strtotime($date));
            $nameOfYear = date('Y');
    
       
       
            $sales = DB::table('mauzos')->where('owner_id',$response['owner_id'])->where('shop_id',$response['shop_id'])->cursor();
            $data = DB::table('products')->where('owner_id',$response['owner_id'])->where('shop_id',$response['shop_id'])
            ->where('total','!=',0)->orderBy('id','desc')->cursor();

            Session::put('seller_id', $response['id']);
            Session::put('owner_id',$response['owner_id']);
            Session::put('shop_id',$response['shop_id']);
            Session::put('money',$response['money']);
            Session::put('fname',$response['fname']);
            Session::put('shop_name',$response['shop_name']);
            Session::put('country',$response['country']);
            Session::put('shop_region',$response['region']);
            Session::put('shop_district',$response['district']);
            Session::put('shop_street',$response['street']);
            Session::put('shop_email',$response['seller_email']);
            Session::put('shop_phone',$response['seller_Phone']);

            return view('seller.index')->with('data',$data)->with('sales',$sales)
            ->with('daySales',DB::table('mauzos')->where('sales_date', $date1)->where('shop_id',$response['shop_id'])->sum('true_price'))
            ->with('dayProfit',DB::table('mauzos')->where('sales_date', $date1)->where('shop_id',$response['shop_id'])->sum('profit'))
            ->with('month_profit',DB::table('mauzos')->where('month', $nameOfMonth)->where('shop_id',$response['shop_id'])->sum('profit'))
            ->with('month_sales',DB::table('mauzos')->where('month', $nameOfMonth)->where('shop_id',$response['shop_id'])->sum('true_price'));
        } else{
            return "jkjkklklj";
        }

        } catch (\Throwable $th) {
           
            return "Invalid credential or It may be No Connection...";
        }
    

       }
}
