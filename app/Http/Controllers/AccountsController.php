<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\SubCategory;
use App\Product;
use App\OrderHistory;
use DB;
use Auth;
use App\Role;
use App\Order;
use App\User;

class AccountsController extends Controller {
	/**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function index(){
    	if(Auth::check()){
            $privi = Role::find(Auth::user()->role_id)->privilages()->get();
            $has_privilage = false;
            foreach ($privi as $p) {
                if($p->id ==5){
                    $has_privilage = true;
                }
            }
            if($has_privilage == true){
                $privileges = Role::find(Auth::user()->role_id)->privilages()->get();
                $order = Order::get();
                $newmembers = DB::table('users')->whereuser_type_id(1)->count();
                $sales = DB::table('order')->count();
                $income = DB::table('order')->sum('amount');
                return view('admin.accounting', compact('privileges','order','newmembers','sales','income'));
            }else{
                return view('404');
            }
        }
        else{
            return view('auth.login');
        }
    }
}