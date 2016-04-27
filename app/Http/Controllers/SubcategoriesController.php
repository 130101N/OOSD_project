<?php 
namespace App\Http\Controllers;

use Image;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use Illuminate\Http\Request;
use App\Category;
use App\SubCategory;
use App\CategoryHasSubCat;
use Mail;
use App\User;
use App\Role;
use Auth;


class SubcategoriesController extends Controller {

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
                $subcategory = SubCategory::get();
                $newsubcategory = SubCategory::take(8)->orderBy('created_at', 'DESC')->get();
                return view('subcategory.index', compact('subcategory','privileges','newsubcategory'));
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
        $subcatgory = SubCategory::find($id);

        return view('subcategory.subcategory-model', compact('subcatgory'));
    }
    

    
    public function update(Request $request){
        $subcategory = SubCategory::whereid($request->get('id'))->first();
        $subcategory->type = $request->get('type');
        $subcategory->description = $request->get('description');
        $subcategory->save();
        return redirect('subcategory')
            ->with('message', 'SubCategory has been updated');
    }
    public function Create(Request $request){
            $this->validate($request, [
                'type' => 'required|min:3',
                'description' =>'min:10',
               'image' => 'required|mimes:jpeg,bmp,png'
                //mimes:jpg,jpeg,png,gif,bmp
            ]);
            $subcategory =  new SubCategory;
            $subcategory->type = $request->get('type');
            $subcategory->description = $request->get('description');
            $imageName = $subcategory->type. '.' . 
            $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(
            base_path() . '/public/img/subcategory/', $imageName);

            $subcategory->image = $imageName;
            $subcategory->save();
            $subcategory->save();
            return redirect('subcategory')
                ->with('message', 'SubCategory Created');
       
    }

    public function Delete(Request $request){
        $subcategory = SubCategory::find($request->get('id'));
        $subcat = CategoryHasSubCat::wherecategory_id($request->get('id'));

        if($subcategory){
            if($subcat){
                $subcat->delete();
            }
            $subcategory->delete();

            return redirect('subcategory')
                ->with('message', 'SubCategory Deleted. SO the products related to this sub category has been deleted');
        }
                 return redirect('subcategory')
                ->with('message', 'Something went wrong please try again');
    }

    
 }