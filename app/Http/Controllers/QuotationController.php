<?php

namespace App\Http\Controllers;
use App\Models\Mauzo;
use App\Models\Product;
use App\Models\YearPeriod;
use App\Models\InvoiceProduct;
use App\Models\Invoice;
use App\Models\QuotationModel;
use App\Models\QuotationProductModel;
use App\Models\Money;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;


class QuotationController extends Controller
{
    public function index(){
        $data = QuotationModel::where('shop_id',Session::get('shop_id'))->get();
        return view('seller/quotation.index')->with('data',$data);
    }

    public function newQuotation(Request $request){
        
        DB::beginTransaction();
        $quotation = new QuotationModel();
        $quotation['owner_id'] = Session::get('owner_id');
        $quotation['shop_id'] = Session::get('shop_id');
        $quotation['date'] = $request['date'];
        $quotation['customer_name'] = $request['customer_name'];
        $quotation['address'] = $request['address'];
        $quotation['email'] = $request['email'];
        $quotation['phone'] = $request['phone'];
        $quotation->save();
        DB::commit();
        Session::put('quotation_id',$quotation->id);
        return redirect()->to(route('seller.create-quotationPage'));
    }

    public function sellerCreateQuotationPage(){
        $data = QuotationModel::where('id',Session::get('quotation_id'))->first();
        return view('seller.quotation.create')->with('quotation_id',Session::get('quotation_id'))->with('data',$data);
    }

    public function sellerQuotationProduct(Request $request){

        
        DB::beginTransaction();
        $product = Product::where('id',$request->product_id)->where('shop_id',Session::get('shop_id'))->first();
  
       
            $quotation_product = new QuotationProductModel();
            $quotation_product['quotation_models_id'] = $request['quotation_number'];
            $quotation_product['product_name'] = $product->name;
            $quotation_product['price'] = $product->sold_price;
            $quotation_product->save();
            
            $product_quotation = QuotationProductModel::where('quotation_models_id',$request['quotation_number'])->get();
    
            DB::commit();
            $count = 0;
            $output ='';
            foreach ($product_quotation as $key => $value) {
                $count = $count + 1;
               
                
                $output .='<tr>
                                <td >'.$value->product_name.'</td>
                                <td>'.$value->price.' '.Session::get('money').'</td>
                            </tr>';
            }
    
            
            return $output;
        

      
    }

    public function sellerViewQuotation(Request $request){

         
         $quotation = QuotationModel::where('id',$request->quote)->first();
         $product_quotation = QuotationProductModel::where('quotation_models_id',$request->quote)->get();
       
         return view('seller.quotation.view')->with('quotation', $quotation)->with('product_quotation', $product_quotation);
    }

    public function sellerQuotationPrint($quotation_id){
        $quotation = QuotationModel::where('id',$quotation_id)->first();
        $product_quotation = QuotationProductModel::where('quotation_models_id',$quotation_id)->get();
      
        return view('seller.quotation.print')->with('quotation', $quotation)->with('product_quotation', $product_quotation);

    }
}
