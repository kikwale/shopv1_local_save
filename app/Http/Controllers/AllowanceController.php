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
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use App\Models\Allowance;
class AllowanceController extends Controller
{
   public function index(){
    $data = seller::join('allowances','sellers.id','=','allowances.seller_id')->where('sellers.shop_id',Session::get('shop_id'))->get();
    return view('owner.allowance.index')->with('data',$data);
   }

   public function assignAllowance(){
    return view('owner.allowance.assign_allowance');
   }

   public function ownerAssignAllowance(Request $request){
    $allowance = new Allowance;
    $allowance['owner_id'] = Session::get('owner_id');
    $allowance['shop_id'] = Session::get('shop_id');
    $allowance['seller_id'] = $request->name_id;
    $allowance['amount'] = $request->allowance;
    $allowance->save();
    return back()->with('success','Successfully ....');

   }

public function ownerEditAllowance(Request $request){
   $allowance = seller::join('allowances','allowances.seller_id','=','sellers.id')
                ->where('allowances.id',$request->al)->where('allowances.shop_id',Session::get('shop_id'))->first();
  Log::info($allowance);
   return view('owner/allowance.edit')->with('allowance',$allowance);
}

public function ownerEditAllowanceForm(Request $request){
   
   $allowance = Allowance::where('id',$request->allowance_id)->first();
   $allowance->seller_id  = $request->name;
   $allowance->amount = $request->allowance;
   $allowance->save();
   return redirect()->to(route('owner.allowance'))->with('success','Successfully...');
}

public function ownerDeleteAllowance(Request $request){
   
   $allowance = Allowance::where('id',$request->al)->delete();
   return redirect()->to(route('owner.allowance'))->with('success','Allowance Deleted Successfully...');
}

}
