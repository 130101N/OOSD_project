<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\SubCategory;
use App\Product;
use App\OrderHistory;
use App\OrderProduct;
use DB;
use Auth;
use App\Role;
use App\Order;
use App\User;

class PrivilagesController extends Controller {

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function order(){
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
                return view('admin.orders', compact('privileges','order'));
            }else{
                return view('404');
            }
        }
        else{
            return view('auth.login');
        }
        
        
    }

    public function orderload(Request $request){
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
                 $order = Order::whereBetween('created_at',[$startDate, $endDate])->get();
                return view('admin.orders', compact('privileges','order'));
            }else{
                return view('404');
            }
        }
        else{
            return view('auth.login');
        }

    }
    public function showupdateOrder($id){
         
         if(Auth::check()){
            $privi = Role::find(Auth::user()->role_id)->privilages()->get();
            $has_privilage = false;
            foreach ($privi as $p) {
                if($p->id ==5){
                    $has_privilage = true;
                }
            }
            if($has_privilage == true){
                $orderState = array();
                $getState = DB::table('order_state')->get();

                foreach($getState as $g)
                    $orderState[$g->id] = $g->type;
                $privileges = Role::find(Auth::user()->role_id)->privilages()->get();
                $order = Order::whereorder_id($id)->first();
                $currentstate =  DB::table('order_state')->whereid($order->state_id)->first()->type;
                $products = OrderProduct::whereorder_id($order->id)->get();
                return view('admin.orderUpdate', compact('privileges','order','orderState','products','currentstate'));
            }else{
                return view('404');
            }
        }
        else{
            return view('auth.login');
        }
    }
    public function updateOrder($id, Request $request){
        $order = Order::whereorder_id($id)->first();
        $order->state_id = $request->get('status');
        $order->save();

        $orderhistory = new OrderHistory;
        $orderhistory->order_id = Order::whereorder_id($id)->first()->id;
        $orderhistory->order_state_id =  $request->get('status');
        $orderhistory->save();
        return redirect('orderd_'.$id)
            ->with('message', 'Order has been updated');

    }

     public function delete(Request $request){
        $order = Order::find($request->get('id'));

        $orderpro = OrderProduct::whereorder_id($request->get('id'));

        if($order){
            if($orderpro){
                    $orderpro ->delete();
                }
            $order ->delete();

            return redirect('order')
                ->with('message', 'Order Deleted!! so the all details related to this order has been deeted');
        }
         return redirect('order')
                ->with('message', 'Something went wrong please try again');
     }

    
    public function category(){
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
                $category = Category::get();
                return view('category.index', compact('category','privileges'));
            }else{
                return view('404');
            }
            }
        else{
            return view('auth.login');
        }       
    }

    public function chart(){
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
                $category = Category::get();
                return view('chart', compact('privileges','category'));
            }else{
                return view('404');
            }
            }
        else{
            return view('auth.login');
        }       
    }

    public function index(){
        if(Auth::check()){
            $privileges = Role::find(Auth::user()->role_id)->privilages()->get();
            return view('admin.index', compact('privileges'));
            
        }
        else{
            return view('auth.login');
        }
        
    }

    public function customer(){
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
                $customer = User::whereuser_type_id(1)->get();
                $newcustomer = User::whereuser_type_id(1)->take(8)->orderBy('created_at', 'DESC')->get();
                return view('admin.customers', compact('newcustomer','privileges','customer'));
            }else{
                return view('404');
            }
            }
        else{
            return view('auth.login');
        }  
    }

    public function user(){
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
                return view('admin.users', compact('privileges'));
            }else{
                return view('404');
            }
            }
        else{
            return view('auth.login');
        }  
    }
}