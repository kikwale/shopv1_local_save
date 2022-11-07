<?php

namespace App\Http\Controllers;

use App\Models\Mauzo;
use App\Models\Product;
use App\Models\YearPeriod;
use App\Models\InvoiceProduct;
use App\Models\Invoice;
use App\Models\Money;
use App\Models\InvoiceAmount;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class InvoiceController extends Controller
{
    public function index(){
        $data = Invoice::where('shop_id',Session::get('shop_id'))->get();
        return view('seller/invoice.index')->with('data',$data);
    }

    public function newInvoice(Request $request){
        
        DB::beginTransaction();
        $invoice = new Invoice();
        $invoice['owner_id'] = Session::get('owner_id');
        $invoice['shop_id'] = Session::get('shop_id');
        $invoice['date'] = $request['date'];
        $invoice['customer_name'] = $request['customer_name'];
        $invoice['address'] = $request['address'];
        $invoice['email'] = $request['email'];
        $invoice['phone'] = $request['phone'];
        $invoice->save();
        DB::commit();
        Session::put('invoice_id',$invoice->id);
        return redirect()->to(route('seller.create-invoicePage'));
    }

    public function sellerCreateInvoicePage(){
        $data = Invoice::where('id',Session::get('invoice_id'))->first();
        return view('seller.invoice.create')->with('invoice_id',Session::get('invoice_id'))->with('data',$data);
    }

    public function sellerInvoiceProduct(Request $request){

        
        DB::beginTransaction();
        $product = Product::where('id',$request->product_id)->where('shop_id',Session::get('shop_id'))->first();
  
        if($product->total < $request->product_quantity){
            return 'Unsufficient';
        } else {
            $invoice_product = new InvoiceProduct();
            $invoice_product['invoices_id'] = $request['invoice_number'];
            $invoice_product['product_name'] = $product->name;
            $invoice_product['total_product'] = $request['product_quantity'];
            $invoice_product['isTaxable'] = $product->isTaxable;
            $invoice_product['total_price'] = $product->sold_price * $request->product_quantity;
            $invoice_product->save();
            
            $product_invoice = InvoiceProduct::where('invoices_id',$request['invoice_number'])->get();
    
            $product->total = $product->total - $request['product_quantity'];
            $product->save();
            DB::commit();
            $count = 0;
            $output ='';
            foreach ($product_invoice as $key => $value) {
                $count = $count + 1;
                if($value->isTaxable == true){
                    $checked = 'checked';
                }else{
                    $checked = '';
                }
                
                $output .='<tr>
                                <td >'.$value->product_name.'</td>
                                <td>'.$value->total_product.'</td>
                                <td><input type="checkbox" disabled '.$checked.' name="" id=""></td>
                                <td>'.$value->total_price.'</td>
                            </tr>';
            }
    
            
            return $output;
        }

      
    }

    public function sellerInvoiceVat(Request $request){
   
     $sub = InvoiceProduct::where('invoices_id',$request['invoice_number'])->sum('total_price');
     $vat = (InvoiceProduct::where('invoices_id',$request['invoice_number'])->where('isTaxable',true)->sum('total_price')/100)*18;
     $total = $sub + $vat;
     $output = '';
     $output .= '<h6 style=""><b>Sub Amount: </b> &nbsp;'.$sub.'</h6>
     <h6 style="flo"><b>VAT(18%): </b> &nbsp;'. $vat.'</h6>
     <h6 style="float:;"><b>Total Amount: </b>  &nbsp;'.$total.'</h6> ';
     return $output;
    }

    public function sellerViewInvoice(Request $request){

         
        $invoice = Invoice::where('id',$request->invoice)->first();
        $product_invoice = InvoiceProduct::where('invoices_id',$request->invoice)->get();
        $sub = InvoiceProduct::where('invoices_id',$request['invoice'])->sum('total_price');
        $vat = (InvoiceProduct::where('invoices_id',$request['invoice'])->where('isTaxable',true)->sum('total_price')/100)*18;
        $total = $sub + $vat;

        return view('seller.invoice.view')->with('invoice', $invoice)
              ->with('product_invoice', $product_invoice)
              ->with('sub', $sub)
              ->with('vat', $vat);
   }

   public function sellerInvoicePrint($invoice_id){
       $invoice_amount = new InvoiceAmount;
       $invoice = Invoice::where('id',$invoice_id)->first();
       $product_invoice = InvoiceProduct::where('invoices_id',$invoice_id)->get();
       $sub = InvoiceProduct::where('invoices_id',$invoice_id)->sum('total_price');

       $invoice_amount->invoices_id = $invoice_id;
       $invoice_amount->owner_id = Session::get('owner_id');
       $invoice_amount->shop_id = Session::get('shop_id');
       $invoice_amount->amount = $sub;
       $invoice_amount->save();

       $vat = (InvoiceProduct::where('invoices_id',$invoice)->where('isTaxable',true)->sum('total_price')/100)*18;
       $total = $sub + $vat;

       return view('seller.invoice.print')->with('invoice', $invoice)
              ->with('product_invoice', $product_invoice)
              ->with('sub', $sub)
              ->with('vat', $vat);;


   }

   public function sellerViewInvoicePrint($invoice_id){
 
    $invoice = Invoice::where('id',$invoice_id)->first();
    $product_invoice = InvoiceProduct::where('invoices_id',$invoice_id)->get();
    $sub = InvoiceProduct::where('invoices_id',$invoice_id)->sum('total_price');

    $vat = (InvoiceProduct::where('invoices_id',$invoice)->where('isTaxable',true)->sum('total_price')/100)*18;
    $total = $sub + $vat;

    return view('seller/invoice.print')->with('invoice', $invoice)
           ->with('product_invoice', $product_invoice)
           ->with('sub', $sub)
           ->with('vat', $vat);;


}
   
}
