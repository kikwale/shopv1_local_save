<?php

namespace App\Http\Controllers;

use App\Models\Mauzo;
use App\Models\Product;
use App\Models\YearPeriod;
use App\Models\Money;
use App\Models\LoanFom;
use App\Models\LoanTo;
use App\Models\Allowance;
use App\Models\seller;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PayrollController extends Controller
{
    public function index(){
        $data = array();
        return view('owner.payroll.index')->with('data',$data);
    }

    public function ownerMonthlyPayroll(Request $request){
        return view('owner.payroll.payroll');
        return $request->all();
    }
}
