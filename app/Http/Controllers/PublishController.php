<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use App\Models\Maduka;
use App\Models\Mauzo;
use App\Models\User;
use App\Models\Invoice;
use App\Models\YearPeriod;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Models\seller;
use App\Models\Product;

class PublishController extends Controller
{
   public function sellerPublishNew(Request $request){
    return view('seller.publish.publish_new');
   }

   public function publishNewSales(Request $request){

      $sales = Mauzo::where('shop_id',Session::get('shop_id'))->where('isPublished', 0)->get()->toArray();
      
      if (!$sales) {
         return back()->with('empty','No New sale');
      }
      $response = Http::post('https://shotram.com/api/local-sales', 
      $sales
     );
     if ($response == "Success") {
      Mauzo::where('shop_id',Session::get('shop_id'))->update(['isPublished' =>1]);
      return back()->with('success','Sales is Published Successfully....');
     } 
   }

   public function publishNewProducts(Request $request){

      $products = Product::where('shop_id',Session::get('shop_id'))->where('isPublished', 0)->get()->toArray();
      
      if (!$products) {
         return back()->with('empty','No New Products');
      }
      $response = Http::post('https://shotram.com/api/local-products', 
      $products
     );
     
     if ($response == "Success") {
      Product::where('shop_id',Session::get('shop_id'))->update(['isPublished' =>1]);
      return back()->with('success','Producs Stock is Published Successfully....');
     } 
   }  

   public function publishNewInvoices(Request $request){

      try {
         $invoices = Invoice::where('shop_id',Session::get('shop_id'))->where('isPublished', 0)->get()->toArray();

         if (!$invoices) {
            return back()->with('empty','No New Invoice or Products');
         }
         $response = Http::post('https://shotram.com/api/local-invoices', 
         $invoices
        );
      
        if ($response == "Success") {
         Invoice::where('shop_id',Session::get('shop_id'))->update(['isPublished' =>1]);
         return back()->with('success','Your Invoice(s) is Published Successfully....');
        } 
      } catch (\Throwable $th) {
         if (Str::contains($th->getMessage(),['Failed to connect'])) {
            return back()->with('empty','Failed to connect');
         }
      }
    
   }  
}
