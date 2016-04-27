<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\SubCategory;
use App\Product;
use App\Order;
use App\OrderProduct;
use App\OrderHistory;
use DB;
use Cart;
use Auth;
use Log;

class shopController extends Controller {

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function shop(){
        
        $category = Category::get();
        Log::info('Showing our category for user: '.$category);
        $sub_category = SubCategory::get();
        Log::info('Showing our subcategory for user: '.$sub_category);
        $newArrival = Product::take(3)->orderBy('created_at', 'DESC')->get();
         Log::info('Showing our new arrival products for user: '.$newArrival);
        return view('shop.master',compact('category','sub_category','newArrival'));
    }

    public function index(){
        
        $category = Category::get();
        Log::info('Showing our category for user: '.$category);

        $sub_category = SubCategory::get();
        Log::info('Showing our subcategory for user: '.$sub_category);
        return view('shop.index',compact('category','sub_category'));
    }

    public function show_sub($type){
        $category = Category::get();
        $sub_category = SubCategory::get();
        $hhcategory = Category::wheretype($type)->first();
        $subCategories = Category::find($hhcategory->id)->subCategories()->get();
        $displaysub =  Category::find($hhcategory->id)->subCategories()->take(4)->orderBy('created_at', 'DESC')->get();
        return view('shop.showsub',compact('subCategories','hhcategory','category','sub_category','displaysub'));
    }

    public function show_pro($type1){
      
        $category = Category::wheretype($type1)->first();
        $products = Product::where('category_id',$category->id)->get();
        Log::info('Showing our products for user: '.$products);
        return view('shop.showPro',compact('products','category'));
    }

    public function show_produc($type1,$type2){
      
        $category = Category::wheretype($type1)->first();
        $subCategories = Category::find($category->id)->subCategories()->get();
        $sub_category = SubCategory::wheretype($type2)->first();
        $products = Product::where('category_id',$category->id)->where('sub_category_id',$sub_category->id)->get();
        return view('shop.showPro',compact('products','subCategories','category'));
    }

    public function search(Request $request){
      
        $keyword = $request->get('keyword');
        $products = Product::where('tittle','like','%'.$keyword.'%')->get();
        return view('shop.search',compact('products'));
    }

    public function editcard($id){
        $product = Product::find($id);
        return view('shop.editcart',compact('product'));
    }

    public function postAddToCart(Request $request){
        $this->validate($request, [
                'greeting' => 'required|min:20',
                'delivery' => 'required|min:20',
                'deliveryCity' => 'required|min:3',
                'deliveryCountry' => 'required|min:3'
                
            ]);
        $products = Product::find($request->get('id'));
        $quantity = $request->get('quantity');

        Cart::add(array(
            'id' => $products->id,
            'name' => $products->tittle,
            'price' => $products->price,
            'quantity' => $quantity,
            'image1' => $products->image,
            'attributes' => array(
                'image' => $products->image,
                'description' =>$request->get('greeting'),
                'deliveryAddress' =>$request->get('delivery'),
                'deliveryCity' =>$request->get('deliveryCity'),
                'deliveryCountry' =>$request->get('deliveryCountry'),
                'size' =>'L'
            )
        ));
        $products = Cart::getContent();
        $paymentMethod = array();
            $getpaymentMethod = DB::table('payment_method')->get();

            foreach($getpaymentMethod as $g)
                $paymentMethod[$g->id] = $g->type;
        return view('shop.cart',compact('products','paymentMethod'));
    }
    
    public function getCart(){
        if(Cart::isEmpty()){
            return view('404');
        }
        if(Auth::check()){
            $paymentMethod = array();
            $getpaymentMethod = DB::table('payment_method')->get();

            foreach($getpaymentMethod as $g)
                $paymentMethod[$g->id] = $g->type;
            $products = Cart::getContent();
            return view('shop.cart',compact('products','paymentMethod'));
        }
         else{
            return view('auth.login');
         }
    }

    public function getRemoveItem(Request $request){
        Cart::remove($request->get('id'));
        return redirect('shop_cart');
    }
    
    public function putOrder(Request $request){
        
       $order =  new Order;
        $order->state_id = 1;
        $order->order_id = uniqid();
        $order->payment_state_id = 2;
        $order->users_id = Auth::user()->id;
        if( $request->get('paymentMethod') == 1){
            $order->payment_method_id = 1;
            $order->amount = Cart::getTotal();
            $order->save();
            $products = Cart::getContent();
            
            foreach($products as $product)
            {
                $items = new OrderProduct;
                $items->order_id = Order::whereorder_id($order->order_id)->first()->id;
                $items->product_id = $product->id; // the Id of the item
                $items->category_id = Product::whereid($product->id)->first()->category_id;
                $items->subcategory_id = Product::whereid($product->id)->first()->sub_category_id;
                $items->description = $product->attributes->description;
                $items->delivery_address = $product->attributes->deliveryAddress;
                $items->delivery_city = $product->attributes->deliveryCity;
                $items->delivery_country = $product->attributes->deliveryCountry;
                $items->quantity = $product->quantity; // the quantity
                $items->save();
            }
            $orderhistory = new OrderHistory;
            $orderhistory->order_id =  Order::whereorder_id($order->order_id)->first()->id;
            $orderhistory->order_state_id = 1;
            $orderhistory->save();

            return view('shop.order',compact('products','order'));
        }else{
            $order->payment_method_id = 2;
            $order->amount = Cart::getTotal();
            $order->save();
            $products = Cart::getContent();
            
            foreach($products as $product)
            {
                $items = new OrderProduct;
                $items->order_id = Order::whereorder_id($order->order_id)->first()->id;
                $items->product_id = $product->id; // the Id of the item
                $items->category_id = Product::whereid($product->id)->first()->category_id;
                $items->subcategory_id = Product::whereid($product->id)->first()->sub_category_id;
                $items->description = $product->attributes->description;
                $items->delivery_address = $product->attributes->deliveryAddress;
                $items->delivery_city = $product->attributes->deliveryCity;
                $items->delivery_country = $product->attributes->deliveryCountry;
                $items->quantity = $product->quantity; // the quantity
                $items->save();
            }

            $orderhistory = new OrderHistory;
            $orderhistory->order_id =  Order::whereorder_id($order->order_id)->first()->id;
            $orderhistory->order_state_id = 1;
            $orderhistory->save();
            return view('shop.orderSandbox',compact('products','order'));
        }
    }
    
 }