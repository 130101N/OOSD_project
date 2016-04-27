<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;

use App\Http\Requests;
use App\Http\Requests\CreateProductRequest;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\SubCategory;
use DB;
use App\Role;
use Auth;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($myid=1)
    {
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
        
                $category_has_sub_category = SubCategory::get();
                $product = Product::get();
                $category = Category::get();
                $categories = array();
                foreach($category as $mycategory)
                                $categories[$mycategory->id] = $mycategory->type;

                $subcategories = array();
                //$subcategory = DB::table('category_has_sub_category')
                        //->where('category_id', 2)
                        //->get();
                $subcategory = DB::table('category_has_sub_category')
                        ->join('sub_category','category_has_sub_category.sub_category_id','=','sub_category.id')
                        ->where('category_has_sub_category.category_id',$myid)
                        ->get();

                foreach($subcategory as $mysubcategory)
                                $subcategories[$mysubcategory->id] = $mysubcategory->type;
                $newProducts = Product::take(8)->orderBy('created_at', 'DESC')->get();
               
                return view('product.index',compact('categories','product','subcategories','privileges','newProducts'));
            }else{
                return view('404');
            }
        }
        else{
            return view('auth.login');
        }
    }

    public function show($id)
    {
        $product = Product::find($id);

        return view('product.product-modal', compact('product'));
    }

    public function getSubCategory($categoryId)
    {

        $subCategories = Category::find($categoryId)->subCategories()->get(['id', 'type']);

        return $subCategories->toArray();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $product = Product::get();
        $category = Category::get();
        $categories = array();
        foreach($category as $mycategory)
                        $categories[$mycategory->id] = $mycategory->type;
                    
       
        return view('product.product-create',compact('categories','product'));
        

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function savedb(Request $request)
    {
            $this->validate($request, [
                'tittle' => 'required|min:3',
                'description' => 'required|min:20',
                'category_id' => 'required|integer',
                'sub_category_id' => 'required|integer',
                'price' => 'required|numeric',
                'image' => 'required|mimes:jpeg,bmp,png'
                //mimes:jpg,jpeg,png,gif,bmp
            ]);
            $product = new Product;
            $product->tittle =  $request->get('tittle');
            $product->category_id =  $request->get('category_id');
            $product->sub_category_id =  $request->get('sub_category_id');
            
            $product->description =  $request->get('description');
            $product->price =  $request->get('price');
            $product->product_id = uniqid();
            

            $imageName = $product->tittle. '.' . 
        $request->file('image')->getClientOriginalExtension();
    $request->file('image')->move(
        base_path() . '/public/img/products/', $imageName);

            $product->image = $imageName;
            $product->save();
            
            $product->save();
                return redirect('product')
                    ->with('message', 'New product Created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
                'tittle' => 'required|min:3',
                'description' => 'required|min:20',
                //'category_id' => 'required|integer',
                //'sub_category_id' => 'required|integer',
                'price' => 'required|numeric',
               // 'image' => 'required|mimes:jpg,jpeg,png,gif,bmp'
            ]);
            $product = Product::whereid($request->get('id'))->first();
            $product->tittle =  $request->get('tittle');
            $product->description =  $request->get('description');
            $product->price =  $request->get('price');
            $product->save();
                return redirect('product')
                    ->with('message', 'Product has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request)
    {
        $product = Product::find($request->get('id'));

        if($product){
            $product->delete();

            return redirect('product')
                ->with('message', 'Product Deleted');
        }
         return redirect('product')
                ->with('message', 'Something went wrong please try again');
    }
}
