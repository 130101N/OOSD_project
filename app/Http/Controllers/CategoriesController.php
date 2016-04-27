<?php 
namespace App\Http\Controllers;

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

class CategoriesController extends Controller {

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */

    public function index(){
        
        
    }

    public function show($type){
        if(Auth::check()){
            $privileges = Role::find(Auth::user()->role_id)->privilages()->get();
            $category = Category::wheretype($type)->first();
            $subCategories = Category::find($category->id)->subCategories()->get(['id', 'type','image']);
            $allSubCateories = array();
            $getAllSubCateories = SubCategory::get();
            foreach($getAllSubCateories as $g)
                $allSubCateories[$g->id] = $g->type;
            return view('category.show', compact('category','subCategories','allSubCateories','privileges'));
        }
        else{
            return view('auth.login')->with('message', 'You must log in first');
        }

        
    }
    public function update($type, Request $request){
        $category = Category::wheretype($type)->first();
        $category->type = $request->get('type');
        $category->description = $request->get('description');
        $category->save();
        return redirect('category')
            ->with('message', 'Category has been updated');
    }
    public function Create(Request $request){
        
            $category =  new Category;
            $category->type = $request->get('type');
            $category->description = $request->get('description');
            $category->save();
            return redirect('category')
                ->with('message', 'Category Created');
       
    }

    public function Delete(Request $request){
        $category = Category::find($request->get('id'));
        $subcat = CategoryHasSubCat::wherecategory_id($request->get('id'));

        if($category){
            if($subcat){
                $subcat->delete();
            }
            $category->delete();

            return redirect('category')
                ->with('message', 'Category Deleted');
        }
         return redirect('category')
                ->with('message', 'Something went wrong please try again');
    }

    public function AddSubCategory($type,Request $request){
        $category = Category::wheretype($type)->first();
        $hasSub  = new CategoryHasSubCat;
        $hasSub->category_id = $category->id;
        $hasSub->sub_category_id = $request->get('subcat');
        $hasSub->save();
        return redirect('category');
    }

    
 }