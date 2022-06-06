<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expenditure;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ExpenditureController extends Controller
{
    
    public function index(){
        $data= Expenditure::where('shop_id',Session::get('shop_id'))->where('owner_id',Session::get('owner_id'))->get();
        return view('owner.expenditure.index')->with('data',$data);
    }

    public function saveExpenditure(Request $request){
        $n = (count($request->all()));
      
        $j = 0;
        try {
            for ($i = 0; $i<$n; $i++) {
                $expenditure =   new Expenditure();
                $j++;
                
                if ($request['name'.$j] == "" || $request['amount'.$j] == "") {
                    continue;
                } else {
                   
                    $expenditure['owner_id'] = Session::get('owner_id');
                    $expenditure['shop_id'] = Session::get('shop_id');
                    $expenditure['month']   = $request['month'];
                    $expenditure['year']    =  $request['year'];
                    $expenditure['name']    = $request['name'.$j];
                    $expenditure['amount']    = $request['amount'.$j];
                    $expenditure->save();
                    
                }
                
               
            }
            return redirect()->to(route('owner.expenditure'))->with('success','Expenditure Inserted Successfuly...');
        } catch (\Throwable $e) {
           
            if (Str::contains($e->getMessage(),['Duplicate entry '])) {
                return back()->with('duplicate','Duplicate of Expenditure Name,Month and year');
            }
        }
       
    }
}
