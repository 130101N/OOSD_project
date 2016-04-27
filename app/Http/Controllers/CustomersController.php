<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\SubCategory;
use App\Product;
use DB;
use Auth;
use App\Role;
use App\Order;
use App\User;

class CustomersController extends Controller {

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function customerload(Request $request){
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
                $startDate = $request->get('startdate');
                $endDate = $request->get('enddate');
                $customer = User::whereuser_type_id(1)->whereBetween('created_at',[$startDate, $endDate])->get();
                $newcustomer = User::whereuser_type_id(1)->take(8)->orderBy('created_at', 'DESC')->get();
                return view('admin.customers', compact('privileges','customer','newcustomer'));
            }else{
                return view('404');
            }
        }
        else{
            return view('auth.login');
        }

    }
}