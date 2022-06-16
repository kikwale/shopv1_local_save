<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Mauzo;
use App\Models\Product;
use App\Models\YearPeriod;
use App\Models\Money;
use App\Models\ProductReturn;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ReturnController extends Controller
{

    public function returnProduct(Request $request){
        $data = DB::table('mauzos')->where('shop_id', Session::get('shop_id'))->where('id', $request->kt)
        ->first();

        $return = new ProductReturn();
        $return['product_id'] = $data->product_id;
        $return['shop_id'] = Session::get('shop_id');
        $return['owner_id'] = Session::get('owner_id');
        $return['seller_id'] = Auth::id();
        $return['quantity'] = $data->amount;
        $return->save();
        
       $product = Product::where('shop_id', Session::get('shop_id'))->where('id', $data->product_id)
        ->first();

        $product->total = $product->total + $data->amount;
        $product->save();

        DB::table('mauzos')->where('shop_id', Session::get('shop_id'))->where('id', $request->kt)
        ->delete();
        return back()->with('success','Successfully Product(s) Returned......!!');
    }

    public function sellerShowReturnedProducts(){
        $data = DB::table('products')
        ->join('product_returns', 'products.id', '=', 'product_returns.product_id')->where('product_returns.shop_id',Session::get('shop_id'))
        ->cursor();

        return view('seller.product.product_return')->with('data',$data);
    }
}
