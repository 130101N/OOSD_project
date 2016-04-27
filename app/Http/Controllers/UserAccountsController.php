<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\User;
use App\SubCategory;
use App\Order;
use Auth;
use Image;
use Log;

class UserAccountsController extends Controller
{
    public function index(){
    	
    	$order = Order::whereUsers_id(Auth::user()->id)->get();
        Log::info('Showing orders related to user: '.$order);
        return view('userAccount.index',compact('order'));
    	
    }
    public function update(Request $request){
    	
    	$user = user::whereid(Auth::user()->id)->first();
        $user->name =  $request->get('name');
            $user->dob =  $request->get('dob');
            $user->address =  $request->get('address');
			$user->tel =  $request->get('tel');

            $user->email =  $request->get('email');
            $imageName = $user->name. '.' . 
            $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(
            base_path() . '/public/img/employee/', $imageName);

            $user->image = $imageName;

            

            
            $user->save();
        return redirect('my_account');
    }

    public function getOrders(Request $request){
    	
    	$user = user::whereid(Auth::user()->id)->first();
        $user->name =  $request->get('name');
            $user->dob =  $request->get('dob');
            $user->address =  $request->get('address');
			$user->tel =  $request->get('tel');

            $user->email =  $request->get('email');

            

            
            $user->save();
        return view('userAccount.index');
    }
    public function show($id)
    {
        $order = Order::whereorder_id($id)->first();
                $currentstate =  DB::table('order_state')->whereid($order->state_id)->first()->type;
                $products = Order::find($order->id)->products()->get();
                 Log::info('Showing products for user: '.$products);
        return view('userAccount.myppp', compact('order','products','currentstate'));
    }

}
