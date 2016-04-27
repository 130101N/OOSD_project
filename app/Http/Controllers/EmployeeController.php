<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Employee;
use App\User;
use DB;
use App\Role;
use Auth;

class EmployeeController extends Controller
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
            $employee = User::whereuser_type_id(2)->get();
            $role = array();
            $job = DB::table('role')->get();
            foreach($job as $g)
                $role[$g->id] = $g->role;
            $gender = array();
            $getGender = DB::table('gender')->get();

            foreach($getGender as $g)
                $gender[$g->id] = $g->type;

           
            return view('employee.index',compact('employee','gender','role','privileges'));
            }else{
                return view('404');
            }
        }
        else{
            return view('auth.login');
        }
    }

    public function store(Request $request)
    {
            $this->validate($request, [
                'name' => 'required|min:3',
                'nic' => 'required|size:10',
                'dob' => 'required',
                'tel' => 'required|numeric',
                'address' => 'required|min:20',
                'email'     => 'required|email',
                'image' => 'required|mimes:jpeg,bmp,png',
               // 'image' => 'required|mimes:jpg,jpeg,png,gif,bmp',
                'password' => 'required|confirmed|min:6'
            ]);
            $employee = new User;
            $employee->name =  $request->get('name');
            $employee->nic =  $request->get('nic');
            $employee->dob =  $request->get('dob');
            $employee->address =  $request->get('address');
			$employee->tel =  $request->get('tel');
            $employee->user_id =  uniqid();
            $employee->email =  $request->get('email');
            $employee->gender_id =  $request->get('gender');
            $employee->role_id =  $request->get('job');
            $employee->user_type_id =  2;
            $employee->emp_pass =  '0';
            $employee->password = bcrypt($request->get('password'));

            

            $imageName = $employee->name. '.' . 
            $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(
            base_path() . '/public/img/employee/', $imageName);

            $employee->image = $imageName;
            $employee->save();
                return redirect('employee')
                    ->with('message', 'New Employee Added');
    }
    public function delete(Request $request)
    {
        $employee = User::find($request->get('id'));

        if($employee){
            $employee->delete();

            return redirect('employee')
                ->with('message', 'Employee details deleted');
        }
         return redirect('employee')
                ->with('message', 'Something went wrong please try again');
    }
}