<?php

namespace App\Http\Controllers;

use App\Models\Maduka;
use App\Models\Mauzo;
use App\Models\User;
use App\Models\YearPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use App\Models\seller;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
  
        if (Auth::user()->role == 'Admin') {
            $data = User::all();
            return view('admin.index')->with('data',$data);
        } 
        if (Auth::user()->role == 'Trader') {
            $maduka = DB::table('madukas')->where('user_id',Auth::id())->cursor();
            return view('owner.index')->with('maduka',$maduka);
        } 
        if (Auth::user()->role == 'Farmer') {
            $data = User::all();
            return view('farmer.index')->with('data',$data);
        } 
        if (Auth::user()->role == 'Seller') {
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

       
            $seller = DB::table('sellers')->where('user_id',Auth::id())->first();
        //     return  DB::table('mauzos')
        // ->join('products', 'mauzos.shop_id', '=', 'products.shop_id')
        // ->where('mauzos.sales_date', $date1)->where('mauzos.shop_id', $seller->shop_id)
        // ->cursor();

            $sales = DB::table('mauzos')->where('owner_id',$seller->owner_id)->where('shop_id',$seller->shop_id)->cursor();
            $data = DB::table('products')->where('owner_id',$seller->owner_id)->where('shop_id',$seller->shop_id)
            ->where('total','!=',0)->orderBy('id','desc')->cursor();
            Session::put('owner_id',$seller->owner_id);
            Session::put('shop_id',$seller->shop_id);
            return view('seller.index')->with('data',$data)->with('sales',$sales)
            ->with('daySales',DB::table('mauzos')->where('sales_date', $date1)->where('shop_id',$seller->shop_id)->sum('true_price'))
            ->with('dayProfit',DB::table('mauzos')->where('sales_date', $date1)->where('shop_id',$seller->shop_id)->sum('profit'))
            ->with('month_profit',DB::table('mauzos')->where('month', $nameOfMonth)->where('shop_id',$seller->shop_id)->sum('profit'))
            ->with('month_sales',DB::table('mauzos')->where('month', $nameOfMonth)->where('shop_id',$seller->shop_id)->sum('true_price'));
        } 
        
    }

    public function showForm(Request $request){
        $role = $request->role;
        return view('admin.adminUserForm')->with('role',$role);

    }
    public function saveTrader(Request $request){
        $role = $request->role;
         $this->validate($request, [
            'fname' => ['required', 'string', 'max:255'],
            'mname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        $user = new User();
        $user->fname =$request->fname; 
        $user->mname =$request->mname; 
        $user->lname =$request->lname; 
        $user->gender =$request->gender; 
        $user->phone =$request->phone; 
        $user->email =$request->email; 
        $user->password = Hash::make(strToUpper($request->lname));
        $user->role =$request->role; 
        $user->save();
      return redirect()->to('adminUserForm')->with('success','Successfuly User Registered...!')->with('role','Trader');

    }

    public function adminUsers(){
        $data = User::all();
        return view('admin.adminUsers')->with('data',$data);
    }
    
    public function admin_register_shop(){
        $data = DB::table('users')->where('role','Trader')->orderBy('id','asc')->cursor();
        return view('admin/shop.admin_register_shop')->with('data',$data);
    }

    public function admin_save_shop(Request $request){

        
// id	user_id	shop_name	country	region	district	ward	street	tin	created_at	updated_at	

        $duka = new Maduka();
        $duka->user_id =$request->user_id; 
        $duka->shop_name =$request->name; 
        $duka->country =$request->country; 
        $duka->region =$request->region; 
        $duka->district =$request->district; 
        $duka->ward =$request->ward; 
        $duka->street = $request->street;
        $duka->tin =$request->tin; 
        $duka->save();
      return redirect()->to('admin_register_shop')->with('success','Successfuly Shop Created...!');

    }

    public function admin_shops(){
        $data = DB::table('madukas')
            ->join('users', 'madukas.user_id', '=', 'users.id')
            ->cursor();

            return view('admin/shop.admin_shops')->with('data',$data);
    }

    
    public function seller_shop_workers(Request $request){
   
        $data = DB::table('sellers')->where('shop_id',$request->shop_id)->orderBy('id','asc')->cursor();
        return view('seller.seller_shop_workers')->with('data',$data);
    }
    
    public function ownerSaveShop(Request $request){
        $duka = new Maduka();
        $duka->user_id = Auth::id(); 
        $duka->shop_name =$request->name; 
        $duka->country =$request->country; 
        $duka->region =$request->region; 
        $duka->district =$request->district; 
        $duka->ward =$request->ward; 
        $duka->street = $request->street;
        $duka->tin =$request->tin; 
        $duka->save();

        return back();
    }

    public function ownerEditEmployee(Request $request){
     
        $data = seller::where('id',$request->id)->first();
     return view('owner.edit_employee')->with('data',$data);

    }

    public function ownerSaveEditedEmployee(Request $request){
     
        
        $user = User::where('id',$request->user_id)->first();

        $user->fname = $request->fname; 
        $user->mname = $request->mname; 
        $user->lname = $request->lname; 
        $user->gender = $request->gender; 
        $user->phone = $request->phone; 
        
        $user->role = 'Seller'; 
        $user->save();

        $seller = seller::where('id',$request->id)->first();

        $seller->shop_id = $request->shop_id;
        $seller->owner_id = $request->owner_id;
        $seller->fname = $request->fname; 
        $seller->mname = $request->mname; 
        $seller->lname = $request->lname; 
        $seller->gender = $request->gender; 
        $seller->phone = $request->phone;
        $seller->save();
        $seller_id = $seller->id;
        
        $contacts = Maduka::where('id',$request->shop_id)->where('seller_Phone','!=','')->where('seller_email','!=','')->first();
        if ($contacts) {

            if ($request->leader == 1) {
                $contacts->seller_email = $request->email;
                $contacts->seller_Phone = $request->phone; 
                $contacts->save();
                 $data = DB::table('sellers')->where('owner_id', $request->owner_id)->where('shop_id',$request->shop_id)->orderBy('id','asc')->cursor();
                return view('owner.workers')
               ->with('owner_id',$request->owner_id)->with('shop_id',$request->shop_id)->with('data',$data)->with('success','Successfully Seller registered......!');
       
            } elseif ($request->leader == 2) {
               
                 $data = DB::table('sellers')->where('owner_id', $request->owner_id)->where('shop_id',$request->shop_id)->orderBy('id','asc')->cursor();
                return view('owner.workers')
               ->with('owner_id',$request->owner_id)->with('shop_id',$request->shop_id)->with('data',$data)->with('success','Successfully Seller registered......!');
       
            }

            
        } else{

            $contacts = Maduka::where('id',$request->shop_id)->first();
            if ($request->leader == 1) {
                $contacts->seller_email = $request->email;
                $contacts->seller_Phone = $request->phone; 
                $contacts->save();
                 $data = DB::table('sellers')->where('owner_id', $request->owner_id)->where('shop_id',$request->shop_id)->orderBy('id','asc')->cursor();
                return view('owner.workers')
               ->with('owner_id',$request->owner_id)->with('shop_id',$request->shop_id)->with('data',$data)->with('success','Successfully Seller registered......!');
       
            } elseif ($request->leader == 2) {
               
                 $data = DB::table('sellers')->where('owner_id', $request->owner_id)->where('shop_id',$request->shop_id)->orderBy('id','asc')->cursor();
                return view('owner.workers')
               ->with('owner_id',$request->owner_id)->with('shop_id',$request->shop_id)->with('data',$data)->with('success','Successfully Seller registered......!');
       
            }


        }


    }
    
    public function ownerDeleteEmployee(Request $request){

        $seller = seller::where('id',$request->id)->first();
        $contacts = Maduka::where('seller_email',$seller->email)->where('seller_Phone',$seller->phone)->first();
        
        if ($contacts) {
            $contacts->seller_email=auth()->user()->email; 
            $contacts->seller_Phone=auth()->user()->phone;
            $contacts->save(); 
        }
        User::where('id',$seller->user_id)->delete();
        seller::where('id',$request->id)->delete();
        return back();
    }

    public function ownerChangePwd(Request $request){
        return view('owner.change_password');
    }

    public  function  ownerSaveNewPwd(Request $request){
        
     
       if (Hash::check($request->current_password , Auth::user()->password)) {

           $user = Auth::user();
           $user->password = Hash::make($request->new_password);
           $user->save();

           return back()->with('success','Successfull Password Changed..');
       }
       
    }

    public function sellerChangePwd(Request $request){
        return view('seller.change_password');
    }

    public  function  sellerSaveNewPwd(Request $request){
        
     
       if (Hash::check($request->current_password , Auth::user()->password)) {

           $user = Auth::user();
           $user->password = Hash::make($request->new_password);
           $user->save();

           return back()->with('success','Successfull Password Changed..');
       }
       
    }
}
