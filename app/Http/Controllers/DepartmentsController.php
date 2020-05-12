<?php

namespace App\Http\Controllers;
use App\Department;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{
    public function index(){
        $data['departments'] = Department::get();
        return view('departments.departmentList',$data);
    }

    public function addNewDepartment(Request $request){
        $department = new Department;
        $department->department_name = $request->department_name;
        $department->save();
        return redirect('admin/department');
    }
    
    public function editDepartment(Request $request){
        $data = Department::find($request->id);
        // dd($data);
        
        return $data;
    }
    public function updateDepartment(Request $request){
        $data = Department::find($request->dept_id);
        $data->department_name = $request->department_name;
        $data->save();
        
        return back();
    }

    public function deletePaymentTerm(Request $request){
        $department = Department::find($request->id);
        $department->delete();
        return back();
    }
}
