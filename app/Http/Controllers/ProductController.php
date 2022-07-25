<?php

namespace App\Http\Controllers;

use App\Models\Mauzo;
use App\Models\Product;
use App\Models\YearPeriod;
use App\Models\Money;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function owner_view_jumla_product(Request $request){
        $data = DB::table('products')->where('category','Jumla')->where('total','!=',0)
        ->where('owner_id',$request->id)->
        where('shop_id',$request->shop_id)->orderBy('id','asc')->cursor();
        return view('owner.product')->with('data',$data);
    }
    public function owner_view_rejareja_product(Request $request){
        $data = DB::table('products')->where('category','Rejareja')->where('total','!=',0)
        ->where('owner_id',$request->id)->
        where('shop_id',$request->shop_id)->orderBy('id','asc')->cursor();
        return view('owner.product')->with('data',$data);
    }
    
    public function rejarejaForm(Request $request){

        
        $total_quantity = DB::table('products')->where('id',$request->product_id)->first();
        $date1=date_create(date('Y-m-d'));
        $date2=date_create($total_quantity->expire);
        $diff=date_diff($date1,$date2);
        
        // %a outputs the total number of days
       $diff->format("%a");
    //  $a=floatval($request->subquantity);
    //      $b = ($a)+($request->total_quantity);
    //      echo $b;
    if ($request->total_quantity == "" && $request->subquantity == '' && $request->discount != '') {
        return  back()->with('unsold',$request->product_id)->with('unsold1','Unsold')
                      ->with('product_sold',$request->total_quantity)->with('product_stored',$total_quantity->total);
     }
    if ($request->total_quantity > $total_quantity->total) {
        return  back()->with('unsold',$request->product_id)->with('unsold1','Unsold')
                      ->with('product_sold',$request->total_quantity)->with('product_stored',$total_quantity->total);
     }
     elseif ($request->discount == '' && $request->subquantity == '' && $request->total_quantity == '') {
        return  back()->with('unsold',$request->product_id)->with('sale_empty','empty')
                      ->with('product_sold',$request->total_quantity)->with('product_stored',$total_quantity->total);
     }
     else{

        if ($request->discount != "" && $request->subquantity != '') {
            $date = date('Y-m-d');
            $nameOfDay = date('l', strtotime($date));
            $nameOfMonth = date('M', strtotime($date));
            $nameOfYear = date('Y');

            $price = $total_quantity->sold_price;
            $profit = $price - $total_quantity->purchased_price;
            $sub_price = $profit/4;
            
          //  id	product_id	seller_id	owner_id	shop_id	day	month	year	quantity	amount	profit	created_at	updated_at	
              $mauzo = new Mauzo;
              $mauzo->product_id = $request->product_id;
              $mauzo->seller_id = Auth::id(); 
              $mauzo->owner_id = Session::get('owner_id');
              $mauzo->shop_id = Session::get('shop_id');
              $mauzo->day = $nameOfDay;
              $mauzo->month = $nameOfMonth;
              $mauzo->year = $nameOfYear;
              $mauzo->sales_date = $date;
              $mauzo->quantity = $total_quantity->quantity;
              $mauzo->amount = $request->total_quantity+$request->subquantity;
              $mauzo->sold_price =  $total_quantity->sold_price;
              $mauzo->true_price = ($total_quantity->sold_price * $request->total_quantity + ($request->subquantity*$total_quantity->sold_price)) - $request->discount;
              $mauzo->discount = $request->discount;
              $mauzo->profit = (($total_quantity->sold_price * $request->total_quantity + ($request->subquantity*$total_quantity->sold_price)) - $request->discount) - (($total_quantity->purchased_price*$request->total_quantity) + ($request->subquantity*$total_quantity->purchased_price));
              $mauzo->customer_name = $request->customer_name;
              
              $mauzo->save();
        
        

              DB::table('products')->where('id',$request->product_id)
                  ->update(['total' => $total_quantity->total-($request->total_quantity+$request->subquantity)]);
            return  back()->with('unsold',"Sold")->with('sold',$request->product_id)
            ->with('daySales',DB::table('mauzos')->where('sales_date', $date1)->where('shop_id',$request->shop_id)->sum('true_price'))
            ->with('dayProfit',DB::table('mauzos')->where('sales_date', $date1)->where('shop_id',$request->shop_id)->sum('profit'))
            ->with('month_profit',DB::table('mauzos')->where('month', $nameOfMonth)->where('year',date('Y'))->where('shop_id',$request->shop_id)->sum('profit'))
            ->with('month_sales',DB::table('mauzos')->where('month', $nameOfMonth)->where('year',date('Y'))->where('shop_id',$request->shop_id)->sum('true_price'));

         } elseif($request->discount == "" && $request->subquantity != '') {
         
            $date = date('Y-m-d');
            $nameOfDay = date('l', strtotime($date));
            $nameOfMonth = date('M', strtotime($date));
            $nameOfYear = date('Y');

            $price = $total_quantity->sold_price;
            $profit = $price - $total_quantity->purchased_price;
            $sub_price = $profit/4;
           
          //  id	product_id	seller_id	owner_id	shop_id	day	month	year	quantity	amount	profit	created_at	updated_at	
              $mauzo = new Mauzo;
              $mauzo->product_id = $request->product_id;
              $mauzo->seller_id = Auth::id();
              $mauzo->owner_id = Session::get('owner_id');
              $mauzo->shop_id = Session::get('shop_id');
              $mauzo->day = $nameOfDay;
              $mauzo->month = $nameOfMonth;
              $mauzo->year = $nameOfYear;
              $mauzo->sales_date = $date;
              $mauzo->quantity = $total_quantity->quantity;
              $mauzo->amount = $request->total_quantity+$request->subquantity;
              $mauzo->sold_price =  $total_quantity->sold_price;
              $mauzo->true_price = ($total_quantity->sold_price * $request->total_quantity + ($request->subquantity*$total_quantity->sold_price)) - $request->discount;
              $mauzo->discount = $request->discount;
              $mauzo->profit = (($total_quantity->sold_price * $request->total_quantity + ($request->subquantity*$total_quantity->sold_price)) - $request->discount) - (($total_quantity->purchased_price*$request->total_quantity) + ($request->subquantity*$total_quantity->purchased_price));
              $mauzo->customer_name = $request->customer_name;
              $mauzo->save();
        
              
              $daySales = 0;
              $dayProfit= 0;
              $daySale = DB::table('mauzos')->where('sales_date', $date)->cursor();
              foreach ($daySale as $value) {
                  $dayProfit = $dayProfit+$value->profit;
              }

              DB::table('products')->where('id',$request->product_id)
                  ->update(['total' => $total_quantity->total-($request->total_quantity+$request->subquantity)]);
            return  back()->with('unsold',"Sold")->with('sold',$request->product_id)->with('daySales',$daySales)->with('dayProfit',$dayProfit);

            
          } 
          elseif($request->discount != "" && $request->subquantity == '') {
            $date = date('Y-m-d');
            $nameOfDay = date('l', strtotime($date));
            $nameOfMonth = date('M', strtotime($date));
            $nameOfYear = date('Y');

            $price = $total_quantity->sold_price;
            $profit = $price - $total_quantity->purchased_price;
            $sub_price = $profit/4;
           
          //  	product_id	seller_id	owner_id	shop_id	day	month	year	sales_date	quantity	amount	sold_price	true_price	discount	profit	created_at	updated_at	
              $mauzo = new Mauzo;
              $mauzo->product_id = $request->product_id;
              $mauzo->seller_id = Auth::id();
              $mauzo->owner_id = Session::get('owner_id');
              $mauzo->shop_id = Session::get('shop_id');
              $mauzo->day = $nameOfDay;
              $mauzo->month = $nameOfMonth;
              $mauzo->year = $nameOfYear;
              $mauzo->sales_date = $date;
              $mauzo->quantity = $total_quantity->quantity;
              $mauzo->amount = $request->total_quantity+$request->subquantity;
              $mauzo->sold_price =  $total_quantity->sold_price;
              $mauzo->true_price =  ($total_quantity->sold_price * $request->total_quantity + ($request->subquantity*$total_quantity->sold_price)) - $request->discount;
              $mauzo->discount = $request->discount;
              $mauzo->profit =(($total_quantity->sold_price * $request->total_quantity + ($request->subquantity*$total_quantity->sold_price)) - $request->discount) - (($total_quantity->purchased_price*$request->total_quantity) + ($request->subquantity*$total_quantity->purchased_price));
              $mauzo->customer_name = $request->customer_name;
              $mauzo->save();
        
              $daySales = 0;
              $dayProfit= 0;
              $daySale = DB::table('mauzos')->where('sales_date', $date)->cursor();
              foreach ($daySale as $value) {
                  $dayProfit = $dayProfit+$value->profit;
              }

              DB::table('products')->where('id',$request->product_id)
                  ->update(['total' => $total_quantity->total-$request->total_quantity]);
              return  back()->with('unsold',"Sold")->with('sold',$request->product_id)->with('daySales',$daySales)->with('dayProfit',$dayProfit);

          }
          elseif($request->total_quantity == "" && $request->subquantity != '') {
            $date = date('Y-m-d');
            $nameOfDay = date('l', strtotime($date));
            $nameOfMonth = date('M', strtotime($date));
            $nameOfYear = date('Y');

            $price = $total_quantity->sold_price - $request->discount;
            $profit = $price - $total_quantity->purchased_price;
            $sub_price = $profit/4;
           
          //  id	product_id	seller_id	owner_id	shop_id	day	month	year	quantity	amount	profit	created_at	updated_at	
              $mauzo = new Mauzo;
              $mauzo->product_id = $request->product_id;
              $mauzo->seller_id = Auth::id();
              $mauzo->owner_id = Session::get('owner_id');
              $mauzo->shop_id = Session::get('shop_id');
              $mauzo->day = $nameOfDay;
              $mauzo->month = $nameOfMonth;
              $mauzo->year = $nameOfYear;
              $mauzo->sales_date = $date;
              $mauzo->quantity = $total_quantity->quantity;
              $mauzo->amount = $request->total_quantity+$request->subquantity;
              $mauzo->discount = $request->discount;
              $mauzo->sold_price =  $total_quantity->sold_price;
              $mauzo->true_price = $total_quantity->sold_price + ($request->subquantity*$total_quantity->sold_price);
              $mauzo->profit = (($request->subquantity/0.25))*$sub_price;
              $mauzo->customer_name = $request->customer_name;
              $mauzo->save();
        
              $daySales = 0;
              $dayProfit= 0;
              $daySale = DB::table('mauzos')->where('sales_date', $date)->cursor();
              foreach ($daySale as $value) {
                  $dayProfit = $dayProfit+$value->profit;
              }

              DB::table('products')->where('id',$request->product_id)
                  ->update(['total' => $total_quantity->total-$request->total_quantity]);
              return  back()->with('unsold',"Sold")->with('sold',$request->product_id)->with('daySales',$daySales)->with('dayProfit',$dayProfit);

          }else{
            $date = date('Y-m-d');
            $nameOfDay = date('l', strtotime($date));
            $nameOfMonth = date('M', strtotime($date));
            $nameOfYear = date('Y');

            $price = $total_quantity->sold_price - $request->discount;
            $profit = $price - $total_quantity->purchased_price;
          //  id	product_id	seller_id	owner_id	shop_id	day	month	year	quantity	amount	profit	created_at	updated_at	
              $mauzo = new Mauzo;
              $mauzo->product_id = $request->product_id;
              $mauzo->seller_id = Auth::id();
              $mauzo->owner_id = Session::get('owner_id');
              $mauzo->shop_id = Session::get('shop_id');
              $mauzo->day = $nameOfDay;
              $mauzo->month = $nameOfMonth;
              $mauzo->year = $nameOfYear;
              $mauzo->sales_date = $date;
              $mauzo->quantity = $total_quantity->quantity;
              $mauzo->amount = $request->total_quantity+$request->subquantity;
              $mauzo->sold_price =  $total_quantity->sold_price;
              $mauzo->true_price = ($total_quantity->sold_price * $request->total_quantity + ($request->subquantity*$total_quantity->sold_price)) - $request->discount;
              $mauzo->profit = $request->total_quantity*$profit;
              $mauzo->customer_name = $request->customer_name;
              $mauzo->save();
        
              $date1=date('Y-m-d');
              $daySales = 0;
              $dayProfit= 0;
              $daySale = DB::table('mauzos')->where('sales_date', $date1)->cursor();
              foreach ($daySale as $value) {
                  $dayProfit = $dayProfit+$value->profit;
              }

              DB::table('products')->where('id',$request->product_id)
                  ->update(['total' => $total_quantity->total-$request->total_quantity]);
            return  back()->with('unsold',"Sold")->with('sold',$request->product_id)->with('daySales',$daySales)->with('dayProfit',$dayProfit);
         }
     }
     echo $request->total_quantity;

    }

    public function jumlaForm(Request $request){
         $total_quantity = DB::table('products')->where('id',$request->product_id)->first();
         
         $date1=date_create(date('Y-m-d'));
        $date2=date_create($total_quantity->expire);
        $diff=date_diff($date1,$date2);
        
        // %a outputs the total number of days
         $diff->format("%a");

         if ($request->total_quantity == "" && $request->discount != '') {
            return  back()->with('unsold',$request->product_id)->with('unsold1','Unsold')
                          ->with('product_sold',$request->total_quantity)->with('product_stored',$total_quantity->total);
         }

         if ($request->total_quantity > $total_quantity->total) {
            return  back()->with('unsold',$request->product_id)->with('unsold1','Unsold')
                          ->with('product_sold',$request->total_quantity)->with('product_stored',$total_quantity->total);
         }else{

            if ($request->discount != "") {
                $date = date('Y-m-d');
                $nameOfDay = date('l', strtotime($date));
                $nameOfMonth = date('M', strtotime($date));
                $nameOfYear = date('Y');

                $price = $total_quantity->sold_price - $request->discount;
                $profit = $price - $total_quantity->purchased_price;
                $request->total_quantity*$profit;
              //  id	product_id	seller_id	owner_id	shop_id	day	month	year	quantity	amount	profit	created_at	updated_at	
                  $mauzo = new Mauzo;
                  $mauzo->product_id = $request->product_id;
                  $mauzo->seller_id = Auth::id();
                  $mauzo->owner_id = $request->owner_id;
                  $mauzo->shop_id = $request->shop_id;
                  $mauzo->day = $nameOfDay;
                  $mauzo->month = $nameOfMonth;
                  $mauzo->year = $nameOfYear;
                  $mauzo->sales_date = $date;
                  $mauzo->quantity = $total_quantity->quantity;
                  $mauzo->amount = $request->total_quantity;
                  $mauzo->discount = $request->discount;
                  $mauzo->sold_price =  $total_quantity->sold_price;
                  $mauzo->true_price = $total_quantity->sold_price - $request->discount;
                  $mauzo->profit = $request->total_quantity*$profit;
                  $mauzo->customer_name = $request->customer_name;
                  $mauzo->save();
            
                  $daySales = 0;
              $dayProfit= 0;
              $daySale = DB::table('mauzos')->where('sales_date', $date)->cursor();
              foreach ($daySale as $value) {
                  $dayProfit = $dayProfit+$value->profit;
              }

                  DB::table('products')->where('id',$request->product_id)
                      ->update(['total' => $total_quantity->total-$request->total_quantity]);
                return  back()->with('unsold',"Sold")->with('sold',$request->product_id)->with('daySales',$daySales)->with('dayProfit',$dayProfit);
             } else {
                $date = date('Y-m-d');
                $nameOfDay = date('l', strtotime($date));
                $nameOfMonth = date('M', strtotime($date));
                $nameOfYear = date('Y');

                $price = $total_quantity->sold_price - $request->discount;
                $profit = $price - $total_quantity->purchased_price;
                $request->total_quantity*$profit;
              //  id	product_id	seller_id	owner_id	shop_id	day	month	year	quantity	amount	profit	created_at	updated_at	
                  $mauzo = new Mauzo;
                  $mauzo->product_id = $request->product_id;
                  $mauzo->seller_id = Auth::id();
                  $mauzo->owner_id = $request->owner_id;
                  $mauzo->shop_id = $request->shop_id;
                  $mauzo->day = $nameOfDay;
                  $mauzo->month = $nameOfMonth;
                  $mauzo->year = $nameOfYear;
                  $mauzo->sales_date = $date;
                  $mauzo->quantity = $total_quantity->quantity;
                  $mauzo->amount = $request->total_quantity;
                  $mauzo->sold_price =  $total_quantity->sold_price;
                  $mauzo->true_price = $total_quantity->sold_price - $request->discount;
                  $mauzo->profit = $request->total_quantity*$profit;
                  $mauzo->customer_name = $request->customer_name;
                  $mauzo->save();
            
                  $date1=date('Y-m-d');
                  $daySales = 0;
              $dayProfit= 0;
              $daySale = DB::table('mauzos')->where('sales_date', $date)->cursor();
              foreach ($daySale as $value) {
                  $dayProfit = $dayProfit+$value->profit;
              }

                  DB::table('products')->where('id',$request->product_id)
                      ->update(['total' => $total_quantity->total-$request->total_quantity]);
                return  back()->with('unsold',"Sold")->with('sold',$request->product_id)->with('daySales',$daySales)->with('dayProfit',$dayProfit);
             }
         }
         echo $request->total_quantity;
    }

    public function seller_selling_product(Request $request){
        
        $date = date('Y-m-d');
        $date1=date('Y-m-d');
        $nameOfDay = date('l', strtotime($date));
        $nameOfMonth = date('M', strtotime($date));
        $nameOfYear = date('Y');

        $sales = DB::table('mauzos')->where('shop_id',$request->shop_id)->cursor();
        $data = DB::table('products')->where('shop_id',$request->shop_id)->where('total','!=', 0)->where('expire','>=',date('Y-m-d'))
        ->where('total','>',0)->orderBy('id','desc')->cursor();
        Session::put('owner_id',$request->id);
        Session::put('shop_id',$request->shop_id);
        return view('seller.seller_selling_product')->with('data',$data)->with('sales',$sales)
        ->with('daySales',DB::table('mauzos')->where('sales_date', $date1)->where('shop_id',$request->shop_id)->sum('true_price'))
        ->with('dayProfit',DB::table('mauzos')->where('sales_date', $date1)->where('shop_id',$request->shop_id)->sum('profit'))
        ->with('month_profit',DB::table('mauzos')->where('month', $nameOfMonth)->where('shop_id',$request->shop_id)->sum('profit'))
        ->with('month_sales',DB::table('mauzos')->where('month', $nameOfMonth)->where('shop_id',$request->shop_id)->sum('true_price'));

       return $request->all();
    }

    public function seller_today_sales(Request $request){

        $date = date('Y-m-d');
        $date1=date('Y-m-d');
        $nameOfDay = date('l', strtotime($date));
        $nameOfMonth = date('M', strtotime($date));
        $nameOfYear = date('Y');

        $data = DB::table('products')
        ->join('mauzos', 'products.shop_id', '=', 'mauzos.shop_id')
        ->where('mauzos.sales_date', $date1)->where('mauzos.shop_id', $request->shop_id)
        ->cursor();
        $sales = DB::table('mauzos')->where('shop_id',$request->shop_id)->cursor();
        Session::put('owner_id',$request->id);
        Session::put('shop_id',$request->shop_id);
        return view('seller/sales.seller_today_sales')->with('data',$data)->with('sales',$sales)
        ->with('daySales',DB::table('mauzos')->where('sales_date', $date1)->where('shop_id',$request->shop_id)->sum('true_price'))
        ->with('dayProfit',DB::table('mauzos')->where('sales_date', $date1)->where('shop_id',$request->shop_id)->sum('profit'))
        ->with('month_sales',DB::table('mauzos')->where('sales_date', $date1)->where('shop_id',$request->shop_id)->sum('discount'));

    }

    public function seller_add_jumla_product(Request $request){
        $data = DB::table('sellers')->where('owner_id', $request->owner_id)->where('shop_id',$request->shop_id)->orderBy('id','asc')->cursor();
        return view('seller/product.seller_add_jumla_product')
               ->with('owner_id',$request->id)->with('shop_id',$request->shop_id)->with('data',$data)->with('success','Successfully Seller registered......!');
   
    }

    public function seller_saveJumlaProduct(Request $request){
        $product = new Product();
        $product->name = $request->name;
        $product->owner_id = $request->owner_id;
        $product->shop_id  = $request->shop_id;
        $product->category = $request->category;
        $product->unit = $request->unit;
        $product->quantity = $request->quantity;
        $product->total = $request->amount;
        $product->notification = $request->notification;
        $product->money_unit = $request->money_symbol; 
        $product->purchased_price = $request->purchased_price;
        $product->sold_price = $request->sold_price;
        $product->expire = $request->expire;
        $product->location = $request->location;
        $product->save();
 
        return back()->with('success','Successfully Product(s) Registered......!!');
    }

    public function seller_view_jumla_product(Request $request){
        $data = DB::table('products')->where('category','Jumla')->where('total','!=',0)
        ->where('owner_id',$request->id)->
        where('shop_id',$request->shop_id)->orderBy('id','asc')->cursor();
        return view('seller/product.seller_view_jumla_product')->with('data',$data);
    }
    
    public function  sellerAddRejarejaProduct(Request $request){
      
        $data = DB::table('sellers')->where('owner_id', Session::get('owner_id'))->where('shop_id',Session::get('shop_id'))->orderBy('id','asc')->cursor();
        return view('seller/product.seller_add_rejareja_product')
               ->with('owner_id',$request->id)->with('shop_id',$request->shop_id)->with('data',$data)->with('success','Successfully Seller registered......!');
   
    }

    public function seller_saveRejarejaProduct(Request $request){
        // {{-- id	name	owner_id	shop_id	category	unit	quantity	amount	purchased_price	sold_price	expire	location	created_at	updated_at	 --}}
        if ( empty($request->subquantity)) {
            $amount = $request->amount*$request->quantity;
            $product = new Product();
            $product->name = $request->name;
            $product->owner_id = $request->owner_id;
            $product->shop_id  = $request->shop_id;
            $product->category = $request->category;
            $product->unit = $request->unit;
            $product->quantity = $request->quantity;
            $product->total = $amount;
            $product->notification = $request->notification;
            $product->money_unit = $request->money_symbol; 
            $product->purchased_price = $request->purchased_price;
            $product->sold_price = $request->sold_price;
            $product->expire = $request->expire;
            $product->location = $request->location;
            $product->save();
     
            return back()->with('success','Successfully Product(s) Registered......!!');
        } elseif(!empty($request->subquantity)){
            $amount = ($request->quantity+$request->subquantity)*$request->amount;
            $product = new Product();
            $product->name = $request->name;
            $product->owner_id = $request->owner_id;
            $product->shop_id  = $request->shop_id;
            $product->category = $request->category;
            $product->unit = $request->unit;
            $product->quantity = $request->quantity;
            $product->total = $amount;
            $product->notification = $request->notification;
            $product->money_unit = $request->money_unit; 
            $product->purchased_price = $request->purchased_price;
            $product->sold_price = $request->sold_price;
            $product->expire = $request->expire;
            $product->location = $request->location;
            $product->save();
     
            return back()->with('success','Successfully Product(s) Registered......!!');
        }
       
 

    }

    public function seller_view_rejareja_product(Request $request){
        $data = DB::table('products')->where('category','Rejareja')->where('total','!=',0)
        ->where('owner_id',$request->id)->
        where('shop_id',$request->shop_id)->orderBy('id','asc')->cursor();
        return view('seller/product.seller_view_rejareja_product')->with('data',$data);
    }

    public function sellerFinishedProduct(Request $request){
        $data = DB::table('products')->where('total','=',0)
        ->where('owner_id',Session::get('owner_id'))->
        where('shop_id',Session::get('shop_id'))->orderBy('id','asc')->cursor();
        return view('seller/product.seller_finished_product')->with('data',$data);
    }
    
   public function soldProducts(Request $request){
   return view('seller.product.seller_sold_products');
   }

   public function soldProductsYear(Request $request){
            
        Session::put('year',$request->year);
        Session::put('type',$request->type);
        return redirect()->to(route('seller.show-product-sold-year'));
       

   }

   public function sellerShowProducctsSoldYear(Request $request){

    $data = DB::table('products')
        ->join('mauzos', 'products.id', '=', 'mauzos.product_id')->where('products.shop_id',Session::get('shop_id'))
        ->where('mauzos.year',Session::get('year'))
        ->cursor();
    return view('seller/product.sold_products')->with('data',$data)->with('type',Session::get('type'))->with('val',Session::get('year'));
   }

   public function soldProductsMonth(Request $request){

    Session::put('year',$request->year);
    Session::put('month',$request->month);
    Session::put('type',$request->type);
    return redirect()->to(route('seller.show-product-sold-month'));

   }

   public function sellerShowProducctsSoldMonth(Request $request){

    $gross_profit = 0;
    $data = DB::table('products')
    ->join('mauzos', 'products.id', '=', 'mauzos.product_id')->where('products.shop_id', Session::get('shop_id'))
    ->where('mauzos.month', Session::get('month'))->where('mauzos.year', Session::get('year'))
    ->cursor();

    $grossProfit = Product::where('shop_id',Session::get('shop_id'))->where('owner_id',Session::get('owner_id'))
    ->where('month', Session::get('month'))->where('year', Session::get('year'))->get();
    
   
    foreach ($grossProfit as $value) {
        $gross_profit = $gross_profit + ($value->total*$value->purchased_price);
    }
   
    $month = $request->month;
    $year = $request->year;

   return view('seller/product.sold_products')
    ->with('data',$data)
    ->with('grossprofit',$gross_profit)
    ->with('type',Session::get('type'))
    ->with('year',Session::get('year'))
    ->with('month',Session::get('month'));

   }


   public function soldProductsDay(Request $request){
   
    
    Session::put('day',$request->day);
    Session::put('type',$request->type);
    return redirect()->to(route('seller.show-product-sold-day'));
   }

   public function sellerShowProducctsSoldDay(Request $request){
   
    $data = DB::table('products')
    ->join('mauzos', 'products.id', '=', 'mauzos.product_id')->where('products.shop_id', Session::get('shop_id'))
    ->where('mauzos.sales_date', Session::get('day'))
    ->cursor();
   return view('seller/product.sold_products')->with('data',$data)->with('type',Session::get('type'))->with('date',Session::get('day'));
   }

   

    public function sellerStore(Request $request){
        $data = DB::table('products')->where('total','!=', 0)->where('expire','>=',date('Y-m-d'))
        ->where('owner_id',Session::get('owner_id'))->
        where('shop_id',Session::get('shop_id'))->orderBy('id','asc')->cursor();
        return view('seller/product.seller_store')->with('data',$data);
    }
    
    public function expiredProducts(Request $request){
        $data = DB::table('products')->where('expire','<=',date('Y-m-d'))
        ->where('owner_id',Session::get('owner_id'))->
        where('shop_id',Session::get('shop_id'))->orderBy('id','asc')->cursor();
        return view('seller/product.seller_expired_product')->with('data',$data);
    }

    public function ownerSales(Request $request){
        return view('owner/sales.sales');
        }

        public function ownerStock(Request $request){
            $data = DB::table('products')
            ->where('owner_id',Session::get('owner_id'))->where('total','!=', 0)->where('expire','>=',date('Y-m-d'))->
            where('shop_id',Session::get('shop_id'))->orderBy('id','asc')->cursor();
            return view('owner/products.stock')->with('data',$data);
        }
    
        public function ownerExpiredProducts(Request $request){
            $data = DB::table('products')->where('expire','<=',date('Y-m-d'))
            ->where('owner_id',Session::get('owner_id'))->
            where('shop_id',Session::get('shop_id'))->orderBy('id','asc')->cursor();
            return view('owner/products.expired_products')->with('data',$data);
        }

        public function ownerProductAnnualSold(Request $request){

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

            return view('owner/products.sold_product_data')->with('data',$data)
            ->with('gross_profit',$gross_profit)->with('type',$request->type)->with('val',$request->year);
            
        }

        public function ownerMonthlyProductSold(Request $request){

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
        
         
            return view('owner/products.sold_product_data')
            ->with('data',$data)
            ->with('gross_profit',$gross_profit)
            ->with('type',$request->type)
            ->with('year',$request->year)
            ->with('month',$request->month);
        }

        public function ownerDailyProductSold(Request $request){

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
   return view('owner/products.sold_product_data')->with('data',$data)
   ->with('type',$request->type)->with('date',$request->day)
   ->with('gross_profit',$gross_profit)->with('success','ghghgj');
            
        }

        public  function sellerAcceptExpired(Request $request){

           
            $product = Product::where('id',$request->pid)->where('shop_id',Session::get('shop_id'))->first();
            $product->isExpired = 1;
            $product->save();
            return back();

        }

        public  function addProduct(Request $request){
          
            $product = Product::where('id',$request->product_id)->where('shop_id',Session::get('shop_id'))->first();
            $product->total = $product->total +  $request['total_amount'];
            $product->notification = $request['notification'];
            $product->purchased_price = $request['purchased_price'];
            $product->sold_price = $request['selling_price'];
            $product->expire = $request['expire_date'];
            $product->location = $request['location'];
            $product->save();
            return back();
        }

        public function sellerUpdateProduct(Request $request){

            
            return view('seller.product.update_product')->with('product', Product::where('id',$request->id)->first());
           
        }

        public function sellerUpdateProductSave(Request $request){

            
            if ( empty($request->subquantity)) {
                $amount = $request->amount*$request->quantity;
                $product = Product::where('id',$request->product_id)->where('shop_id',$request->shop_id)->first();
                $product->name = $request->name;
                $product->owner_id = $request->owner_id;
                $product->shop_id  = $request->shop_id;
                $product->category = $request->category;
                $product->unit = $request->unit;
                $product->notification = $request->notification;
                $product->purchased_price = $request->purchased_price;
                $product->sold_price = $request->sold_price;
                $product->expire = $request->expire;
                $product->location = $request->location;
                $product->save();
         
                return back()->with('success','Successfully Product(s) Updated......!!');
            } elseif(!empty($request->subquantity)){
                $amount = ($request->quantity+$request->subquantity)*$request->amount;
                $product = new Product();
                $product->name = $request->name;
                $product->owner_id = $request->owner_id;
                $product->shop_id  = $request->shop_id;
                $product->category = $request->category;
                $product->unit = $request->unit;
                
                $product->notification = $request->notification;
                $product->money_unit = $request->money_unit; 
                $product->purchased_price = $request->purchased_price;
                $product->sold_price = $request->sold_price;
                $product->expire = $request->expire;
                $product->location = $request->location;
                $product->save();
         
                return back()->with('success','Successfully Product(s) Updated......!!');
            }

        }

        public function sellerDeleteProduct(Request $request){

            Product::where('id',$request->id)->where('shop_id',Session::get('shop_id'))->delete();
            return back()->with('success','Successfully Product(s) Deleted......!!');
        }
}
