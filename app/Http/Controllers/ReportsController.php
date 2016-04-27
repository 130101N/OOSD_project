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
use PDF;

class ReportsController extends Controller {
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
                $reportType = array();
	            $getreportType = DB::table('report')->get();

	            foreach($getreportType as $g)
	                $reportType[$g->id] = $g->type;
                $order = Order::get();
                return view('pdf.report', compact('privileges','order','reportType'));
            }else{
                return view('404');
            }
        }
        else{
            return view('auth.login');
        }
        
    }

    public function postpdf(Request $request){
    	$startDate = $request->get('startdate');
        $endDate = $request->get('enddate');
        if($request->get('reportType') == 1){
        	$order = Order::whereBetween('created_at',[$startDate, $endDate])->get();
	    	$pdf = PDF::loadView('pdf.accounts',compact('order'));
			return $pdf->download('accounts.pdf');
        }else if($request->get('reportType') == 2){
        	$order = Order::whereBetween('created_at',[$startDate, $endDate])->whereIn('state_id', [1, 2, 3,4])->get();
	    	$pdf = PDF::loadView('pdf.accounts',compact('order'));
			return $pdf->download('accounts.pdf');
        }else{
        	$order = Order::whereBetween('created_at',[$startDate, $endDate])->whereNotIn('state_id', [1, 2, 3,4])->get();
	    	$pdf = PDF::loadView('pdf.accounts',compact('order'));
			return $pdf->download('accounts.pdf');
        }
        
    }
}