<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use Auth;
use App\User;
use Cart;
use PDF;

use App\Http\Controllers\IpnListener;


class OrdersController extends Controller {

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */


    public function show(){
    	
    	return view('orderHistory');
    }
    public function success(){
        // STEP 1: Read POST data
        if(Auth::check()){
        if(isset($_POST['txn_id'])){

            // reading posted data from directly from $_POST causes serialization 
            // issues with array data in POST
            // reading raw POST data from input stream instead. 
            $raw_post_data = file_get_contents('php://input');
            $raw_post_array = explode('&', $raw_post_data);
            $myPost = array();
            foreach ($raw_post_array as $keyval) {
              $keyval = explode ('=', $keyval);
              if (count($keyval) == 2)
                 $myPost[$keyval[0]] = urldecode($keyval[1]);
            }
            // read the post from PayPal system and add 'cmd'
            $req = 'cmd=_notify-validate';
            if(function_exists('get_magic_quotes_gpc')) {
               $get_magic_quotes_exists = true;
            } 
            foreach ($myPost as $key => $value) {        
               if($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) { 
                    $value = urlencode(stripslashes($value)); 
               } else {
                    $value = urlencode($value);
               }
               $req .= "&$key=$value";
            }


            // STEP 2: Post IPN data back to paypal to validate

            $ch = curl_init('https://www.sandbox.paypal.com/cgi-bin/webscr'); // change to [...]sandbox.paypal[...] when using sandbox to test
            curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
            curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));

            // In wamp like environments that do not come bundled with root authority certificates,
            // please download 'cacert.pem' from "http://curl.haxx.se/docs/caextract.html" and set the directory path 
            // of the certificate as shown below.
            // curl_setopt($ch, CURLOPT_CAINFO, dirname(__FILE__) . '/cacert.pem');
            if( !($res = curl_exec($ch)) ) {
                // error_log("Got " . curl_error($ch) . " when processing IPN data");
                curl_close($ch);
                exit;
            }
            curl_close($ch);


            // STEP 3: Inspect IPN validation result and act accordingly

            if (strcmp ($res, "VERIFIED") == 0) {
                    echo "Order has benn created";
                // check whether the payment_status is Completed
                // check that txn_id has not been previously processed
                // check that receiver_email is your Primary PayPal email
                // check that payment_amount/payment_currency are correct
                // process payment

                // assign posted variables to local variables
                $item_name = $_POST['item_name'];
                $item_number = $_POST['item_number'];
                $payment_status = $_POST['payment_status'];
                echo $payment_status;
                if ($_POST['mc_gross'] != NULL)
                    $payment_amount = $_POST['mc_gross'];
                else
                    $payment_amount = $_POST['mc_gross1'];
                $payment_currency = $_POST['mc_currency'];
                $txn_id = $_POST['txn_id'];
                $receiver_email = $_POST['receiver_email'];
                $payer_email = $_POST['payer_email'];
                $custom = $_POST['custom'];
                $payment_date = $_POST['payment_date'];
                $payer_id = $_POST['payer_id'];
                $order_id = $_POST['item_name'];
                
                // Insert your actions here
                if($payment_status == 'Completed'){
                    $order = Order::whereorder_id($order_id)->first();
                    $order->payment_state_id = 1;
                    $order->transaction_id = $txn_id;
                    $order->payment_date = $payment_date;
                    $order->payer_id = $payer_id;
                    $order->save();
                }
                
                // Insert your actions here

            } else if (strcmp ($res, "INVALID") == 0) {
                    echo "Order not created";
                // log for manual investigation
            }

            $payer = User::whereid(Auth::user()->id)->first();
            $products = Cart::getContent();
            return view('order.success',compact('payer','products','payment_date','txn_id','payer_id'));        }
        else{
            $payment_date = '2013/34/5';
                $payer_id = 'csssssssssssffm';
                $txn_id = 'ssssssssssssssssss';

            $payer = User::whereid(Auth::user()->id)->first();
            $products = Cart::getContent();
            return view('order.success',compact('payer','products','payment_date','txn_id','payer_id'));

            //return view('order.success');
        }}
        else{
            return view('auth.login')->with('message', 'You must log in first');
        }
    }



    public function cancel(){
        
        return view('order.cancel');
    }

    public function putAddOrder( Request $request){
        
       $order =  new Order;
        $order->state_id = 1;
        $order->payment_state_id = 2;
        $order->users_id = Auth::user()->id;
        $order->amout = Cart::getTotal();
            $order->save();
            return redirect('category');
    }

    public function postPDF(){
        $payer = User::whereid(Auth::user()->id)->first();
        $products = Cart::getContent();

        $pdf = PDF::loadView('pdf.invoice',compact('products','payer'));
        return $pdf->download('invoice.pdf');
    }

    
 }