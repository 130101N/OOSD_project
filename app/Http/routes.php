<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use Illuminate\Support\Facades\Mail;
use App\User;
use App\Order;
Route::get('/', function () {
    
        return view('main');
    
});


Route::get('pdf', function () {
    //$pdf = App::make('dompdf.wrapper');
    //$pdf->loadHTML('<h1>Test</h1>');
    //return $pdf->stream();
    $payer = User::whereid(Auth::user()->id)->first();
    $products = Cart::getContent();
    $pdf = new DOMPDF();
    $pdf->set_paper("A4", "portrait");
    $pdf->set_base_path("https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/");
    $pdf = PDF::loadView('pdf.invoice',compact('products','payer'));
return $pdf->download('invoice.pdf');
});

Route::get('pdf2', function () {
    $pdf = PDF::loadView('pdf.accounts');
return $pdf->download('accounts.pdf');
});


Route::get('calender', function () {
    return view('calender');
});

Route::get('emails', function () {
    $user = User::findOrFail(1);

        Mail::send('emails.index', ['user' => $user], function ($m) use ($user) {
            $m->to($user->email, $user->name)->subject('Your Reminder!');
        });

});

Route::get('register_verify_{confirmationCode}', function ($confirmationCode) {
    if( ! $confirmationCode)
        {
            throw new InvalidConfirmationCodeException;
        }

        $user = User::whereconfirmation_code($confirmationCode)->first();

        if ( ! $user)
        {
            throw new InvalidConfirmationCodeException;
        }

        $user->confirmed = 1;
        $user->confirmation_code = null;
        $user->save();


        return redirect('auth_login');
});


Route::get('shop','shopController@shop');
Route::patch('shop_search','shopController@search');
Route::get('shopindex','shopController@index');
Route::get('shop-{type}','shopController@show_sub');
Route::get('shop_cart','shopController@getCart');
Route::post('shop_cart','shopController@postAddToCart');
Route::patch('shop_cart','shopController@putOrder');
Route::delete('shop_cart','shopController@getRemoveItem');
//Route::get('shop-{type1}','shopController@show_pro');
Route::get('shop_{type1}_{type2}','shopController@show_produc');
Route::get('edit_{id}','shopController@editcard');

Route::get('product_view','PagesController@showProduct');
Route::get('order_history','OrdersController@show');
Route::get('about_us','PagesController@showAboutUs');

Route::get('category_{type}','CategoriesController@show');
Route::post('category_{type}','CategoriesController@update');
Route::patch('category_{type}','CategoriesController@AddSubCategory');
Route::patch('category','CategoriesController@create');
Route::delete('category','CategoriesController@Delete');

Route::get('subcategory','SubcategoriesController@index');
Route::get('subcategory/{id}','SubcategoriesController@show');
Route::patch('subcategory','SubcategoriesController@update');
Route::post('subcategory','SubcategoriesController@create');
Route::delete('subcategory','SubcategoriesController@Delete');

//Route::resource('product', 'ProductsController');
Route::get('product/{id}','ProductsController@show');
Route::get('product/create','ProductsController@create');
Route::get('product','ProductsController@index');
Route::post('product','ProductsController@savedb');
Route::patch('product','ProductsController@update');
Route::delete('product','ProductsController@destroy');
Route::get('products/{categoryId}','ProductsController@getSubCategory');

Route::get('sandbox/{id}', 'ProductsController@getSubCategory');


Route::get('employee','EmployeeController@index');
Route::post('employee','EmployeeController@store');
Route::delete('employee','EmployeeController@delete');


// Authentication routes...
Route::get('auth_login', 'Auth\AuthController@getLogin');
Route::post('auth_login', 'Auth\AuthController@postLogin');
Route::get('auth_logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth_register', 'Auth\AuthController@getRegister');
Route::post('auth_register', 'Auth\AuthController@postRegister');

// Password reset link request routes...
Route::get('password_email', 'Auth\PasswordController@getEmail');
Route::post('password_email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::get('gcsad','PrivilagesController@index');
Route::get('user','PrivilagesController@user');
Route::get('order','PrivilagesController@order');
Route::patch('order','PrivilagesController@orderload');
Route::delete('order','PrivilagesController@delete');
Route::get('orderd_{id}','PrivilagesController@showupdateOrder');
Route::patch('orderd_{id}','PrivilagesController@updateOrder');
Route::get('category','PrivilagesController@category');
Route::get('customer','PrivilagesController@customer');
Route::patch('customer','CustomersController@customerload');
Route::get('chart','PrivilagesController@chart');
Route::get('order_success','OrdersController@success');
Route::patch('order_success','OrdersController@postPDF');
//Route::get('order_success','OrdersController@cancel');
Route::get('order_cancel','OrdersController@cancel');
Route::get('accounting','AccountsController@index');
Route::get('reports','ReportsController@index');
Route::post('reports','ReportsController@postpdf');


Route::get('my_account','UserAccountsController@index');
Route::post('my_account','UserAccountsController@update');
Route::get('my_account/{id}','UserAccountsController@show');

Route::get('sandbox', function() {
    $order = DB::table('order')->whereBetween('created_at',['2015-06-01', '2015-08-01'])->get();

    dd($order);

});


